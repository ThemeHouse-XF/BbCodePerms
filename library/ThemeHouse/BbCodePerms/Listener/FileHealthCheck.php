<?php

class ThemeHouse_BbCodePerms_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/BbCodePerms/Extend/ThemeHouse/NoForo/Model/NoForo.php' => 'b34cb1074cc8d43c98a98ea43e98982d',
                'library/ThemeHouse/BbCodePerms/Extend/XenForo/BbCode/Formatter/Base.php' => '885dd45f34e02e7c1f5a3ddc127d9e9a',
                'library/ThemeHouse/BbCodePerms/Extend/XenForo/ControllerPublic/Thread.php' => '642cc431f94b41b78721c2529149c816',
                'library/ThemeHouse/BbCodePerms/Extend/XenForo/Model/Post.php' => 'f1da1a85386659c3a249ea3a424a304a',
                'library/ThemeHouse/BbCodePerms/Listener/LoadClassBbCode.php' => '46462134f88b06dd81b4b8c5f43e907e',
                'library/ThemeHouse/BbCodePerms/Listener/LoadClassController.php' => '8b3c7df29a2f24db1c7f8aceae838f2b',
                'library/ThemeHouse/BbCodePerms/Listener/LoadClassModel.php' => 'bb785bd1b4c928f14484b8fcb21cb5a2',
                'library/ThemeHouse/BbCodePerms/Listener/TemplateCreate.php' => '0cec2f8b069ffc9e91d38eb63ffcc8fe',
                'library/ThemeHouse/BbCodePerms/Listener/TemplateHook.php' => '8f042dc90cb31b3a7b23144a197be5b0',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
                'library/ThemeHouse/Listener/Template.php' => '0aa5e8aabb255d39cf01d671f9df0091',
                'library/ThemeHouse/Listener/Template/20150106.php' => '8d42b3b2d856af9e33b69a2ce1034442',
                'library/ThemeHouse/Listener/TemplateCreate.php' => '6bdeb679af2ea41579efde3e41e65cc7',
                'library/ThemeHouse/Listener/TemplateCreate/20150106.php' => 'c253a7a2d3a893525acf6070e9afe0dd',
                'library/ThemeHouse/Listener/TemplateHook.php' => 'a767a03baad0ca958d19577200262d50',
                'library/ThemeHouse/Listener/TemplateHook/20150106.php' => '71c539920a651eef3106e19504048756',
            ));
    }
}