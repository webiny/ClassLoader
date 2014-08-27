<?php
/**
 * Webiny Framework (http://www.webiny.com/framework)
 *
 * @link      http://www.webiny.com/wf-snv for the canonical source repository
 * @copyright Copyright (c) 2009-2013 Webiny LTD. (http://www.webiny.com)
 * @license   http://www.webiny.com/framework/license
 */

namespace Webiny\Component\ClassLoader\Tests\Loaders;

use Webiny\Component\ClassLoader\ClassLoader;

/**
 * @runTestsInSeparateProcesses
 */
class PearTest extends \PHPUnit_Framework_TestCase
{

    function testFindClassCaseOne()
    {
        ClassLoader::getInstance()->registerMap(['Zend_' =>
                                                     [
                                                         'Path' => '/vendors/',
                                                     ]
                                                ]);
        $classPath = ClassLoader::getInstance()->findClass('Zend_Acl_Assert_Interface');
        $this->assertSame('/vendors/Zend/Acl/Assert/Interface.php', $classPath);
    }

    function testFindClassCaseTwo()
    {
        ClassLoader::getInstance()->registerMap(['Smarty_' =>
                                                     [
                                                         'Path'         => '/var/www/Vendors/Smarty/libs/sysplugins',
                                                         'Normalize'    => false,
                                                         'Case'         => 'lower'
                                                     ]
                                                ]);
        $classPath = ClassLoader::getInstance()->findClass('Smarty_Internal_Compile_Call');
        $this->assertSame('/var/www/Vendors/Smarty/libs/sysplugins/smarty_internal_compile_call.php', $classPath);
    }

}