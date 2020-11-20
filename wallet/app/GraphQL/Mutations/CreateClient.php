<?php

namespace App\GraphQL\Mutations;


use GraphQL\Type\Definition\ResolveInfo;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreateClient
{
    protected $soapWrapper;
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $this->soapWrapper->add('wallet', function ($service) {
            $service
                ->wsdl('http://soap.local/api/server?WSDL')
                ->trace(true)
                ->classmap([]);
        });
        $response = $this->soapWrapper->call('wallet.registroCliente', [
            'name' => $args['name'],
            'dni'   => $args['identification'],
            'email'     => $args['email'],
            'phone'       =>$args['phone'],
        ]);

        //Convert the XML string into an SimpleXMLElement object.
        $xmlObject = simplexml_load_string($response);

        //Encode the SimpleXMLElement object into a JSON string.
        $jsonString = json_encode($xmlObject);

        //Convert it back into an associative array for
        //the purposes of testing.
        $jsonArray = json_decode($jsonString, true);

        return $jsonArray;
    }
}
