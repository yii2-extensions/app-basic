<?php

namespace Terabytesoft\App\Basic;

use terabytesoft\app\basic\assets\AppAsset;
use yii\base\Theme;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;

/**
 * Class AppAssetTest.
 *
 * Unit tests for codeception
 */
class AppAssetTest extends \Codeception\Test\Unit
{
    private $app;
    private $bundle;
    private $view;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before(): void
    {
        $this->view = new View();
    }

    /**
     * testAppAssetSimpleDependency
     */
    public function testAppAssetSimpleDependency(): void
    {
        \PHPUnit_Framework_Assert::assertEmpty($this->view->assetBundles);

        AppAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertCount(4, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(AppAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[AppAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(
            AssetBundle::class,
            $this->view->assetBundles[BootstrapAsset::class]
        );
    }

    /**
     * testAppAssetSourcesPublish
     */
    public function testAppAssetSourcesPublish(): void
    {
        $bundle = AppAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertTrue(is_dir($bundle->basePath));

        $this->sourcesPublishVerifyFiles('css', $bundle);
    }

    /**
     * testAppAssetRegister
     */
    public function testAppAssetRegister(): void
    {
        \PHPUnit_Framework_Assert::assertEmpty($this->view->assetBundles);

        AppAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertCount(4, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(AppAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);

        $result = $this->view->renderFile('@terabytesoft/app/basic/tests/_data/main.php');

        \PHPUnit_Framework_Assert::assertRegexp('/site.css/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/yii.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/jquery.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/bootstrap.css/', $result);
    }

    /**
     * sourcesPublishVerifyFiles
     *
     * @param string $type
     * @param array  $bundle
     */
    private function sourcesPublishVerifyFiles($type, $bundle): void
    {
        foreach ($bundle->$type as $filename) {
            $publishedFile = $bundle->basePath . DIRECTORY_SEPARATOR . $filename;
            $sourceFile = $bundle->sourcePath . DIRECTORY_SEPARATOR . $filename;
            \PHPUnit_Framework_Assert::assertFileExists($publishedFile);
            \PHPUnit_Framework_Assert::assertFileEquals($publishedFile, $sourceFile);
        }

        \PHPUnit_Framework_Assert::assertTrue(is_dir($bundle->basePath));
    }
}
