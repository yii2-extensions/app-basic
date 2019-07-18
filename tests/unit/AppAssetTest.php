<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\assets\AppAsset;
use yii\base\Theme;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;

/**
 * Class AppAssetTest
 *
 * Unit tests for codeception
 */
class AppAssetTest extends \Codeception\Test\Unit
{
    /**
     * @var \yii\web\AssetBundle $bundle
     */
    protected $bundle;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \yii\web\View $view
     */
    protected $view;

    /**
     *_before
     */
    protected function _before(): void
    {
        $this->view = new View();
    }

    /**
     *_after
     */
    protected function _after(): void
    {
        unset($this->bundle);
        unset($this->tester);
        unset($this->view);
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
        $this->bundle = AppAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertTrue(is_dir($this->bundle->basePath));

        $this->sourcesPublishVerifyFiles('css', $this->bundle);
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

        $result = $this->view->renderFile(codecept_data_dir() . '/views/main.php');

        \PHPUnit_Framework_Assert::assertRegexp('/site.css/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/yii.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/jquery.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/bootstrap.css/', $result);
    }

    /**
     * sourcesPublishVerifyFiles
     */
    protected function sourcesPublishVerifyFiles(string $type, AssetBundle $bundle): void
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
