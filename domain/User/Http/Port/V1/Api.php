<?php

declare(strict_types=1);

namespace Domain\User\Http\Port\V1;

use Dof\Framework\PortManager;
use Dof\Framework\EntityManager;
use Dof\Framework\DomainManager;
use Dof\Framework\ConfigManager;
use Dof\Framework\StorageManager;
use Dof\Framework\DSL\IFRSN;
use Dof\Framework\Container;

use Domain\User\Service\Application\ShowUserService;
use Domain\User\Service\Application\DeleteUserService;

/**
 * @Route(api)
 * @Version(v2)
 * @Author(me@dof.php)
 * @Group(online-api){title=在线接口}
 */
class Api
{
    /**
     * @Title(dddd)
     * @Type(Uint)
     */
    private $var;

    /**
     * @Title(用户ID)
     * @Type(Uint)
     */
    private $uid;

    /**
     * @NotRoute(1)
     * @Route(/)
     * @Verb(get)
     * @MimeOut(json)
     * @MimeOut(_)
     */
    public function index()
    {
        return ['Dof' => 'Hello World'];
    }

    /**
     * @Title(文档测试)
     * @Route(docs)
     * @Verb(get)
     */
    public function docs()
    {
        return EntityManager::getEntities();
        return RouteManager::getDocs();
    }

    /**
     * @NotRoute(1)
     * @Route(test/a)
     * @Verb(get)
     */
    public function testanno()
    {
        annotation(__CLASS__);
        annotation(__FILE__, true);
    }

    /**
     * @NotRoute(1)
     * @Route(mime)
     * @Verb(get)
     * @MimeIn(_)
     * @MimeOut(_)
     * @Suffix(json,xml)
     * @WrapOut(_)
     */
    public function mime()
    {
        pd($this->route);
        return 1024;
    }

    /**
     * @NotRoute(1)
     * @Route(query)
     * @Verb(get,post)
     * @MimeIn(_)
     * @MimeOut(json)
     * @WrapOut()
     */
    public function query()
    {
        $return = $this->request->get('return', '');
        if (! $return) {
            $this->response->setError(true);
            // $this->response->setStatus(400);
            // $this->response->setStatus(400)->setError(false);
            // dd($this->response->isSuccess());
            return [400, 'no return field'];
        }

        // $result = IFRSN::parseSentenceContent(urldecode($return));
        $result = IFRSN::parse(urldecode($return));

        return $result;
    }

    /**
     * @NotRoute(1)
     * @Route(test/http)
     * @Verb(get)
     */
    public function testhttp()
    {
        // dd(http('http://api.clink.cn/interfaceAction/cdrIbInterface!listCdrIbIvrDetail.action', [
            // 'enterpriseId' => 3005382,
            // 'id' => '10.10.62.138-1548141476.95200',
            // 'seed' => '1111',
            // 'userName' => 'admin',
            // 'pwd' => '75bcf1a055273dfa0a539b1cf1a43833',
        // ])->setUrlencode(false)->get()->bodyAsJson());
//
        // dd(http('http://api.clink.cn/interfaceAction/cdrIbInterface!listCdrIbIvrDetail.action', [
            // 'enterpriseId' => 3005382,
            // 'id' => '10.10.62.138-1548141476.95200',
            // 'seed' => '1111',
            // 'userName' => 'admin',
            // 'pwd' => '75bcf1a055273dfa0a539b1cf1a43833',
        // ])->setUrlencode(false)->post());
    }

    /**
     * @NotRoute(1)
     * @Route(test/repo)
     * @Verb(get)
     */
    public function testrepo()
    {
        // pt(DomainManager::getRoot());
        // pt(DomainManager::getNamespaces());
        // pt(DomainManager::getFiles());
        // pt(DomainManager::getDirs());
        // pt(DomainManager::getDomainKeyByFilepath(__FILE__));
        // pd(DomainManager::getDomainKeyByNamespace(__CLASS__));

        echo 'repo';
    }

    /**
     * @NotRoute(0)
     * @Title(测试ORM)
     * @Group(debug/orm-map){调试/ORM映射}
     * @Route(test/orm)
     * @Verb(get)
     */
    public function testorm()
    {
        StorageManager::compile([
            '/data/wwwroot/pw.centos/domain/User',
        ]);

        ee(StorageManager::getOrms());
    }

    /**
     * @Title(测试路由)
     * @Group(debug/default){调试/默认}
     * @NoDoc(0)
     * @NotRoute(0)
     * @Route(test)
     * @Verb(get)
     * @Suffix(json)
     * @Suffix(xml)
     * @MimeOut(json)
     * @Argument(uid){need}
     */
    public function test(DeleteUserService $service)
    {
        pd(PortManager::getPorts());
        dd(port()->mimeout());
        dd(port()->mimein());
        dd(port()->title());
        dd(port()->argument('cr_uid'));

        // pd(EntityManager::getEntities());

        return $service->setUid(route()->params->port->uid)->execute();

        // dd(ConfigManager::getDomainFinalEnvByKey('user', 'enable_test', false));

        // pd(annotation(\Domain\User\Entity\User::class, \Dof\Framework\EntityManager::class, false, false)[1]);
        // pd(Container::build(ShowUserService::class, '__construct'));
        // dd(11, http_get('http://pw.centos/query'));
        // dd(http_head('https://www.bing.com/dict/'));
        // ee(http_put('http://pw.centos/users/1?kw=2', ['type' => 'p32', 'adsf' => 43])->bodyAsJson());
        // dd(http_get('http://pw.centos/query')->body);
        // ee(http_head('http://pw.centos/query?return=user(id,mobile{mask:1},post(id,title{length:2},comment(id,email{mask:1},content)),messages(id,title,test{a:1,b:2,c{3,4}}));admin(id,name,mobile,role(id,name))'));
        // ee(http_get('http://pw.centos/query?return=user(id,mobile{mask:1},post(id,title{length:2},comment(id,email{mask:1},content)),messages(id,title,test{a:1,b:2,c{3,4}}));admin(id,name,mobile,role(id,name))')->body);
        // ee(http_delete('http://pw.centos/users/1?kw=2', ['type' => 'p32', 'adsf' => 43]));
        // ee(http_delete('http://pw.centos/users/1?kw=2', ['type' => 'p32', 'adsf' => 43])->bodyAsJson(false));
        // ee(http_patch('http://pw.centos/users/1?kw=2', ['type' => 'p32', 'adsf' => 43])->bodyAsXml());
        // dd(http_patch('http://pw.centos/users/1', ['type' => 32]));
        // dd(http_post('http://pw.centos/users?432=23', ['d'=>32]));
        // dd(http_get('http://pw.centos/query')->body);
    }
}
