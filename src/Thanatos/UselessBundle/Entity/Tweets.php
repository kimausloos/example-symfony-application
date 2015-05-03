<?php

namespace Thanatos\UselessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tweets
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tweets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tweet", type="string", length=255)
     */
    private $tweet;

    /**
     * @var string
     *
     * @ORM\Column(name="authorname", type="string", length=255)
     */
    private $authorname;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tweet
     *
     * @param string $tweet
     * @return Tweets
     */
    public function setTweet($tweet)
    {
        $this->tweet = $tweet;

        return $this;
    }

    /**
     * Get tweet
     *
     * @return string 
     */
    public function getTweet()
    {
        return $this->tweet;
    }

    /**
     * Set authorname
     *
     * @param string $authorname
     * @return Tweets
     */
    public function setAuthorname($authorname)
    {
        $this->authorname = $authorname;

        return $this;
    }

    /**
     * Get authorname
     *
     * @return string 
     */
    public function getAuthorname()
    {
        return $this->authorname;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Tweets
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Tweets
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }
}
