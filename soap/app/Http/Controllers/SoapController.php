<?php

namespace App\Http\Controllers;

use App\Providers\MethodsProvider;
use Illuminate\Http\Request;

use WSDL\Annotation\BindingType;
use WSDL\Annotation\SoapBinding;
use WSDL\Builder\WSDLBuilder;
use WSDL\WSDL;

class SoapController extends Controller
{
    public function server()
    {

        $builder = WSDLBuilder::instance()
            ->setName('payco')
            ->setTargetNamespace('http://soap.local/api/server')
            ->setNs('http://foo.bar/documentliteralservice/types')
            ->setLocation('http://soap.local/api/server')
            ->setPortName('payco')
            ->setStyle(SoapBinding::DOCUMENT)
            ->setUse(SoapBinding::LITERAL)
            ->setSoapVersion(BindingType::SOAP_11)
            ->setMethods(MethodsProvider::get());

        $wsdl = WSDL::fromBuilder($builder);

        if (isset($_GET['wsdl'])) {
            header("Content-Type: text/xml");
            echo $wsdl->create();
            exit;
        }
        $server = new \SoapServer(NULL, [
            'uri' => $builder->getTargetNamespace(),
            'location' => $builder->getLocation(),
            'style' => SOAP_DOCUMENT,
            'use' => SOAP_LITERAL
        ]);
        $server->setClass('App\Http\Controllers\ServiceController');
        $server->handle();
        exit;
    }
}
