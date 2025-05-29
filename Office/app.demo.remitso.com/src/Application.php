<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use App\WebService\PasswordPolicy;
use App\WebService\Settings;
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\I18n\I18n;
use Cake\I18n\Middleware\LocaleSelectorMiddleware;
use Cake\Network\Request;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Psr\Http\Message\ResponseInterface;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin(\DebugKit\Plugin::class);
        }

        $settings = new Settings();
        Configure::write("App.Settings", $settings->getArray());

        $passwordPolicy = new PasswordPolicy();
        Configure::write("App.PasswordPolicy", $passwordPolicy->getArray());

        Configure::write("languages", [
            "en_GB" => [
                'db_friendly' => 'english',
                'label' => '<img src="/assets/img/eng.webp" height="24.2em" width="24.2em">&nbsp;&nbsp;English'
            ],
            "fr_FR" => [
                'db_friendly' => 'french',
                'label' => '<img src="/assets/img/france-icon.webp" height="24.2em" width="24.2em">&nbsp;&nbsp;Français'
            ],
            "pt_BR" => [
                'db_friendly' => 'portuguese',
                'label' => '<img src="/assets/img/portuguese.webp" height="24.2em" width="24.2em">&nbsp;&nbsp;Português'
            ],
        ]);
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue)
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(null, Configure::read('Error')))
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime')
            ]))
            ->add(new RoutingMiddleware($this))
            ->add(new LocaleSelectorMiddleware(array_keys(Configure::read('languages'))))
            ->add(function(Request $request, ResponseInterface $response, $next){
                I18n::setLocale($request->getParam('language', I18n::getLocale()));
                return $next($request, $response);
            });

        return $middlewareQueue;
    }

    /**
     * @return void
     */
    protected function bootstrapCli()
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        $this->addPlugin('Migrations');

        // Load more plugins here
    }
}
?>
