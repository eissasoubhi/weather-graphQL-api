<?php

namespace App\GraphQL\Resolver;

use App\Entity\Weather;
use Metaer\CurlWrapperBundle\CurlWrapper;
use Overblog\GraphQLBundle\Error\UserError;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class WeatherResolver implements ResolverInterface, AliasedInterface
{
    protected $parameters;
    protected $curl_wrapper;

    public function __construct(CurlWrapper $curl_wrapper, ParameterBagInterface $parameters)
    {
        $this->parameters = $parameters;
        $this->curl_wrapper = $curl_wrapper;
    }

    public function predict($city)
    {
        $weather_webservice = $this->parameters->get('curl_wrapper')['clients']['weather'];

        $options = [
            CURLOPT_URL => $weather_webservice['baseurl'].'/forecast?q='.$city.'&APPID='.$weather_webservice['APPID'],
            CURLOPT_RETURNTRANSFER => true,
        ];

        try {
            $data = $this->curl_wrapper->getQueryResult($options);
            $data = json_decode($data, true);

            if ($data['cod'] == "200") {
                $weather = new Weather($data);
            } else {
                throw new UserError($data['message']);
            }
        } catch (CurlWrapperException $e) {

        }

        return $weather->getData();
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases()
    {
        return [
            'predict' => 'predict'
        ];
    }
}