<?php

/**
 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.

 * ---
 * Copyright (c) 2011, Oxwall Foundation
 * All rights reserved.

 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the
 * following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice, this list of conditions and
 *  the following disclaimer.
 *
 *  - Redistributions in binary form must reproduce the above copyright notice, this list of conditions and
 *  the following disclaimer in the documentation and/or other materials provided with the distribution.
 *
 *  - Neither the name of the Oxwall Foundation nor the names of its contributors may be used to endorse or promote products
 *  derived from this software without specific prior written permission.

 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Feed Widget
 *
 * @author Sergey Kambalin <greyexpert@gmail.com>
 * @package ow_plugins.newsfeed.components
 * @since 1.0
 */
class NEWSFEED_CMP_EntityFeedWidget extends NEWSFEED_CMP_FeedWidget
{
    private $feedId;
    private $feedType;

    protected $defaultParams = array(
        'statusForm' => true,
        'statusMessage' => null,
        'widget' => array()
    );

    /**
     * @return Constructor.
     */
    public function __construct( BASE_CLASS_WidgetParameter $paramObj )
    {
        parent::__construct($paramObj);

        $this->feedId = $paramObj->additionalParamList['entityId'];
        $this->feedType = $paramObj->additionalParamList['entity'];

        $event = new OW_Event('feed.on_widget_construct', array(
            'feedId' => $this->feedId,
            'feedType' => $this->feedType
        ));
        OW::getEventManager()->trigger($event);
        $data = $event->getData();

        $data = array_merge($this->defaultParams, $data);

        foreach ( $data['widget'] as $setting => $value )
        {
            $this->setSettingValue($setting, $value);
        }

        $feed = $this->createFeed($this->feedType, $this->feedId);
        $feed->setDisplayType(NEWSFEED_CMP_Feed::DISPLAY_TYPE_ACTIVITY);

        if ( $data['statusForm'] )
        {
            $visibility = NEWSFEED_BOL_Service::VISIBILITY_FULL - NEWSFEED_BOL_Service::VISIBILITY_SITE;

            $feed->addStatusForm($this->feedType, $this->feedId, $visibility);
        } 
        else if (!empty($data['statusMessage'])) 
        {
            $feed->addStatusMessage($data['statusMessage']);
        }

        $this->setFeed( $feed );
    }
    
    /**
     * 
     * @param string $feedType
     * @param int $feedId
     * @return NEWSFEED_CMP_Feed
     */
    protected function createFeed( $feedType, $feedId )
    {
        $driver = OW::getClassInstance("NEWSFEED_CLASS_FeedDriver");
        
        return OW::getClassInstance("NEWSFEED_CMP_Feed", $driver, $feedType, $feedId);
    }
}