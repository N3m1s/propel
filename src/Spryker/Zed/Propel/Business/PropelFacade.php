<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Propel\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Command\Command;

/**
 * @method PropelBusinessFactory getFactory()
 */
class PropelFacade extends AbstractFacade
{

    /**
     * @return void
     */
    public function cleanPropelSchemaDirectory()
    {
        $this->getFactory()->createDirectoryRemover()->execute();
    }

    /**
     * @return void
     */
    public function copySchemaFilesToTargetDirectory()
    {
        $this->getFactory()->createModelSchema()->copy();
    }

    /**
     * @return void
     */
    public function adjustPropelSchemaFilesForPostgresql()
    {
        $this->getFactory()->createPostgresqlCompatibilityAdjuster()->adjustSchemaFiles();
    }

    /**
     * @return void
     */
    public function adjustPostgresqlFunctions()
    {
        $this->getFactory()->createPostgresqlCompatibilityAdjuster()->addMissingFunctions();
    }

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        return $this->getFactory()->getConsoleCommands();
    }

}
