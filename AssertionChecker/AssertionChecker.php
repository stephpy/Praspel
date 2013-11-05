<?php

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2013, Ivan Enderlin. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace {

from('Hoa')

/**
 * \Hoa\Praspel\Visitor\Praspel
 */
-> import('Praspel.Visitor.Praspel');

}

namespace Hoa\Praspel\AssertionChecker {

/**
 * Class \Hoa\Praspel\AssertionChecker.
 *
 * Generic assertion checker.
 *
 * @author     Ivan Enderlin <ivan.enderlin@hoa-project.net>
 * @copyright  Copyright © 2007-2013 Ivan Enderlin.
 * @license    New BSD License
 */

abstract class AssertionChecker {

    /**
     * Specification.
     *
     * @var \Hoa\Praspel\Model\Specification object
     */
    protected $_specification  = null;

    /**
     * Data of the specification.
     *
     * @var \Hoa\Praspel array
     */
    protected $_data           = null;

    /**
     * Whether we are able to automatically generate data.
     *
     * @var \Hoa\Praspel bool
     */
    protected $_generateData   = false;

    /**
     * Callable to validate and verify.
     *
     * @var \Hoa\Core\Consistency\Xcallable object
     */
    protected $_callable       = null;



    /**
     * Construct.
     *
     * @access  public
     * @param   \Hoa\Praspel\Model\Specification  $specification    Specification.
     * @param   \Hoa\Core\Consistency\Xcallable   $callable         Callable.
     * @param   bool                              $genrateData      Generate data.
     * @return  void
     */
    public function __construct ( \Hoa\Praspel\Model\Specification $specification,
                                  \Hoa\Core\Consistency\Xcallable  $callable,
                                  $generateData = false ) {

        $this->setSpecification($specification);
        $this->setCallable($callable);
        $this->automaticallyGenerateData($generateData);

        return;
    }

    /**
     * Assertion checker.
     *
     * @access  public
     * @return  bool
     * @throw   \Hoa\Praspel\Exception\Generic
     * @throw   \Hoa\Praspel\Exception\Group
     */
    abstract public function evaluate ( &$trace = false );

    /**
     * Generate data.
     *
     * @access  public
     * @return  array
     */
    abstract public function generateData ( );

    /**
     * Set specification.
     *
     * @access  protected
     * @param   \Hoa\Praspel\Model\Specification  $specification    Specification.
     * @return  \Hoa\Praspel\Model\Specification
     */
    protected function setSpecification ( \Hoa\Praspel\Model\Specification $specification ) {

        $old                  = $this->_specification;
        $this->_specification = $specification;

        return $old;
    }

    /**
     * Get specification.
     *
     * @access  public
     * @return  \Hoa\Praspel\Model\Specification
     */
    public function getSpecification ( ) {

        return $this->_specification;
    }

    /**
     * Enable or disable the automatic data generation.
     *
     * @access  public
     * @param   bool  $generateData    Generate data or not.
     * @return  bool
     */
    public function automaticallyGenerateData ( $generateData ) {

        $old                 = $this->_generateData;
        $this->_generateData = $generateData;

        return $old;
    }

    /**
     * Whether we are able to automatically generate data.
     *
     * @access  public
     * @return  bool
     */
    public function canGenerateData ( ) {

        return $this->_generateData;
    }

    /**
     * Set data.
     *
     * @access  public
     * @param   array  $data    Data.
     * @return  array
     */
    public function setData ( Array $data ) {

        $old         = $this->_data;
        $this->_data = $data;

        return $old;
    }

    /**
     * Get data.
     *
     * @access  public
     * @return  array
     */
    public function getData ( ) {

        return $this->_data;
    }

    /**
     * Set callable.
     *
     * @access  protected
     * @param   \Hoa\Core\Consistency\Xcallable  $callable    Callable.
     * @return  \Hoa\Core\Consistency\Xcallable
     */
    protected function setCallable ( \Hoa\Core\Consistency\Xcallable $callable ) {

        $old             = $this->_callable;
        $this->_callable = $callable;

        return $old;
    }

    /**
     * Get callable.
     *
     * @access  public
     * @return  \Hoa\Core\Consistency\Xcallable
     */
    public function getCallable ( ) {

        return $this->_callable;
    }

    /**
     * Get visitor Praspel.
     *
     * @access  protected
     * @return  \Hoa\Praspel\Visitor\Praspel
     */
    protected function getVisitorPraspel ( ) {

        if(null === $this->_visitorPraspel)
            $this->_visitorPraspel = new \Hoa\Praspel\Visitor\Praspel();

        return $this->_visitorPraspel;
    }
}

}

namespace {

/**
 * Flex entity.
 */
Hoa\Core\Consistency::flexEntity('Hoa\Praspel\AssertionChecker\AssertionChecker');

}
