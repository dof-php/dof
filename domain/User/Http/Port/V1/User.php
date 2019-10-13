<?php

declare(strict_types=1);

namespace Domain\User\Http\Port\V1;

use Domain\User\Service\Application\ListUserService;
use Domain\User\Service\Application\ShowUserService;

use Dof\Framework\ConfigManager;
use Dof\Framework\OFB\Pipe\BearerAuth;
use Dof\Framework\OFB\Pipe\Paginate;
use Dof\Framework\OFB\Pipe\GraphQLAlike;
use Dof\Framework\OFB\Wrapper\Pagination;
use Domain\User\Assembler\User as UserAssembler;
use Domain\User\Http\Wrapper\In\User as UserWrapper;
use Domain\User\Http\Wrapper\In\ABC;

/**
 * @Author(me@dof.php)
 * @Group(user-basic){title=用户基本信息}
 * @Version(v1)
 * @Auth(3)
 * @Model(Domain\User\Entity\User)
 * @Route(users)
 * @Pipein(BearerAuth)
 * @NoPipeIn(BearerAuth)
 * @NoPipeIn(GraphQLAlike)
 * @Suffix(json)
 * @Suffix(xml)
 * @MimeOut(json)
 */
class User
{
    /**
     * @title(User Id)
     * @Compatible(id,uid,userId)
     * @Type(Uint){%s必须是正整数%s}
     */
    private $id;

    /**
     * @Title(User Realname)
     * @Compatible(uname,realname)
     * @Type(String)
     * @Min(2){至少长于2}
     */
    private $name;

    /**
     * @Title(User Mobile)
     * @Compatible(phone)
     * @Type(String)
     * @Mobile(cn)
     */
    private $mobile;

    /**
     * @Title(用户电子邮箱)
     * @Compatible(mail_addr)
     * @Type(String)
     * @Email()
     */
    private $email;

    /**
     * @Title(附加数据)
     * @Type(ValueArray)
     * @Compatible(more)
     * @Wrapin(User)
     * @Notes(可以放置一些乱七八糟的数据)
     */
    private $extra;

    /**
     * @Title(更新用户信息)
     * @Route({id})
     * @Auth(2)
     * @Verb(patch)
     * @Verb(put)
     * @MimeOut(_)
     * @WrapOut(_)
     * @Argument(id,name)
     * @Argument(email){needifno:id}
     * @Argument(extra)
     */
    public function update(int $id)
    {
        return $this->request->all();
    }

    /**
     * @Title(创建用户)
     * @Verb(post)
     * @WrapIn(UserWrapper)
     */
    public function create()
    {
        response()->setStatus(201);

        return [
            'id' => 1,
            'name' => 'foo',
            'p' => $_REQUEST,
        ];
    }

    /**
     * @Title(获取用户列表)
     * @Route(/)
     * @Verb(get)
     * @WrapOut(Pagination)
     * @WrapIn(UserWrapper)
     * @Alias(get_user_list)
     * @PipeIn(Paginate)
     * @Assembler(UserAssembler)
     */
    public function list(ListUserService $service)
    {
        // pd(route()->params->api);
        // pd(route()->params->pipe->get(Paginate::class));

        $list = [
            ['name' => 'cj', 'mobile' => '13344445555', 'createdAt' => time()],
            ['name' => 'jc', 'mobile' => '15522223333', 'createdAt' => time()],
        ];

        return paginator($list);
    }

    /**
     * @Title(获取用户详情)
     * @NotRoute(0)
     * @Route({id})
     * @Verb(get)
     * @MimeOut(xml)
     * @MimeOut(json)
     * @Assembler(UserAssembler)
     */
    public function show(int $id, ShowUserService $service)
    {
        // dd(get_used_classes(__FILE__, false));
        // dd(get_used_classes(__CLASS__));

        // dd(config('domain')->get('domain')->has('http.port'));
        // dd(config('domain')->get('domain')->get('http.port')->prefix);
        // pd(domain()->key);
        // pd(domain()->config('database')->conn_default);
        // pd(domain()->config('domain')->get('http.port.prefix'));

        // dd(domain()->config->domain->get('http'));
        // dd(domain()->config('database')->get('conn_default'));

        // dd(domain()->config('domain')->get('http.port.prefix2'));
        // dd(is_date_format('2019-01-31', 'Y-m-d'));
        // dd($this->route->params->api);

        return $service->setId($id);

        // return $service->setId($this->route->params->kv->id)->exec();
        // return $service->setId($id)->exec()->__toArray();
        // return $service->setId($id)->execute();
        // return ShowUserService::init()->setId($id)->execute();
        // return [ShowUserService::init()->setId($id)->exec()];
        // return ShowUserService::init()->setId($id)->exec()->__getData();
        // return service(ShowUserService::class, ['id' => $id]);
    }

    /**
     * @Title(删除一个用户)
     * @Route({id})
     * @Verb(delete)
     * @Model(_)
     * @Alias(delete_user_by_id)
     * @MimeOut(json)
     */
    public function delete(int $id)
    {
        $this->response->setStatus(204);

        return [null, 100, 'no content'];

        return ['删除: '.$id, 400];
    }

    /**
     * @Title(编辑 ID)
     * @NoDoc(1)
     * @Route({id})
     * @NotRoute(1)
     * @Verb(get)
     * @Verb(post)
     * @Alias(get_user_list2)
     * @MimeOut(json)
     */
    public function edit(int $id)
    {
        return route()->params;

        return ['编辑: '.$id, 400];
    }
}
