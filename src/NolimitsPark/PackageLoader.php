<?php

namespace NolimitsPark;

class PackageLoader
{
    /**
     * @var \ZipArchive
     */
    protected $file;

    protected $indexFile = 'index.xml';

    protected $parkInformation;

    /**
     * @param \ZipArchive $file
     */
    public function __construct(\ZipArchive $file)
    {
        $this->file = $file;
    }

    /**
     * A factory method for loading a NL package.
     * @param $filename
     * @return static
     */
    public static function createFactory($filename)
    {
        return new static((new \ZipArchive())->open($filename));
    }

    /**
     * @return ParkInformation
     */
    public function getParkInformation()
    {
        if ($this->parkInformation) {
            return $this->parkInformation;
        }

        $xml = new \SimpleXMLElement($this->file->getFromName($this->indexFile));

        $this->parkInformation = new ParkInformation($xml->park);

        return $this->parkInformation;
    }

    /**
     * Raw preview image data
     *
     * @return mixed
     */
    public function getPreviewImage()
    {
        $previewImage = $this->getParkInformation()->getPreviewImage();
        return $this->file->getFromName($this->getFilesPrefix() . '/' . $previewImage);
    }

    /**
     * Raw park data
     *
     * @return mixed
     */
    public function getParkFile()
    {
        $parkFile = $this->getParkInformation()->getParkFile();
        return $this->file->getFromName($this->getFilesPrefix() . '/' . $parkFile);
    }

    /**
     * @return string
     */
    protected function getFilesPrefix()
    {
        return $this->getParkInformation()->getFilesPrefix();
    }
}
