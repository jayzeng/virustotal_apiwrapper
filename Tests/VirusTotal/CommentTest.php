<?php
/**
 * comment object test code
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

use \VirusTotal\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComment() {
        // Mock real response
        $mockResponse = array(
            'response_code' => 1,
            'verbose_msg' => 'Your comment was successfully posted'
        );

        $commentStub = $this->getMock('\VirusTotal\Comment',
                               array('addComment'),
                               array(apiKey));
        $commentStub->expects($this->any())
             ->method('addComment')
             ->will($this->returnValue($mockResponse));

        $fakeResourceId = 1234343;
        $response = $commentStub->addComment($fakeResourceId, 'test comment');

        $this->assertSame(1, $response['response_code']);
        $this->assertSame('Your comment was successfully posted', $response['verbose_msg']);
    }
}
?>
