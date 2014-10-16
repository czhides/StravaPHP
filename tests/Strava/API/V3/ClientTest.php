<?php
use Respect\Validation\Exceptions\ValidationException;
use Strava\API\V3\ServiceException;

/**
 * Happy flow testing..
 */
class ClientTest extends PHPUnit_Framework_TestCase
{    
    private function getServiceMock() {
        $serviceMock = $this->getMockBuilder('Strava\API\V3\ServiceStub')
            ->disableOriginalConstructor()
            ->getMock();
        return $serviceMock;
    }
    
    function testGetStreamsSegmentValidRequest()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\V3\Client($serviceMock);
        $segment = $client->getStreamsSegment(1234,'test');
        
        $this->assertEquals('output', $segment);
    }

    function testGetStreamsSegmentInvalidRequest()
    {
    }
}
    