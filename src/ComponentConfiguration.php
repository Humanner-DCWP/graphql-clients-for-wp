<?php

declare(strict_types=1);

namespace PoP\GraphQLClientsForWP;

use PoP\APIEndpoints\EndpointUtils;
use PoP\ComponentModel\ComponentConfiguration\EnvironmentValueHelpers;
use PoP\ComponentModel\ComponentConfiguration\ComponentConfigurationTrait;

class ComponentConfiguration
{
    use ComponentConfigurationTrait;

    private static $getGraphQLClientsComponentURL;

    private static $isGraphiQLClientEndpointDisabled;
    private static $graphiQLClientEndpoint;
    private static $isGoyagerClientEndpointDisabled;
    private static $voyagerClientEndpoint;


    /**
     * URL under which the clients are loaded.
     * Needed to convert relative paths to absolute URLs
     *
     * @return string
     */
    public static function getGraphQLClientsComponentURL(): string
    {
        // Define properties
        $envVariable = Environment::GRAPHQL_CLIENTS_COMPONENT_URL;
        $selfProperty = &self::$getGraphQLClientsComponentURL;
        $defaultValue = '';

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue
        );
        return $selfProperty;
    }

    /**
     * Is the GraphiQL client disabled?
     *
     * @return string
     */
    public static function isGraphiQLClientEndpointDisabled(): bool
    {
        // Define properties
        $envVariable = Environment::DISABLE_GRAPHIQL_CLIENT_ENDPOINT;
        $selfProperty = &self::$isGraphiQLClientEndpointDisabled;
        $defaultValue = false;
        $callback = [EnvironmentValueHelpers::class, 'toBool'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }

    /**
     * GraphiQL client endpoint, to be executed against the GraphQL single endpoint
     *
     * @return string
     */
    public static function getGraphiQLClientEndpoint(): string
    {
        // Define properties
        $envVariable = Environment::GRAPHIQL_CLIENT_ENDPOINT;
        $selfProperty = &self::$graphiQLClientEndpoint;
        $defaultValue = '/graphiql/';
        $callback = [EndpointUtils::class, 'slashURI'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }

    /**
     * Is the Voyager client disabled?
     *
     * @return string
     */
    public static function isVoyagerClientEndpointDisabled(): bool
    {
        // Define properties
        $envVariable = Environment::DISABLE_VOYAGER_CLIENT_ENDPOINT;
        $selfProperty = &self::$isGoyagerClientEndpointDisabled;
        $defaultValue = false;
        $callback = [EnvironmentValueHelpers::class, 'toBool'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }

    /**
     * Voyager client endpoint, to be executed against the GraphQL single endpoint
     *
     * @return string
     */
    public static function getVoyagerClientEndpoint(): string
    {
        // Define properties
        $envVariable = Environment::VOYAGER_CLIENT_ENDPOINT;
        $selfProperty = &self::$voyagerClientEndpoint;
        $defaultValue = '/schema/';
        $callback = [EndpointUtils::class, 'slashURI'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }
}
