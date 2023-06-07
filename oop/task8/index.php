<?php
declare(strict_types=1);
srand(time());
class Channel
{
    private string $channelName;
    private array $videos;
    private Video $video;

    public function __construct(string $channelName,array $videos)
    {
        $this->channelName=$channelName;
        $this->videos=$videos;
    }
    public function getChannelName()
    {
        return $this->channelName;
    }

    public function getVideoList(): array
    {
        $videoList=[];
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            $videoList[]=$this->video->getName();
        }
        return $videoList;
    }

    public function getSumViews(): int
    {
        $sumViews=0;
        foreach ($this->videos as $video) {
            $this->video=$video;
            $sumViews+=$this->video->getViews();
        }
        return $sumViews;
    }

    public function getSumSalaryFromVideos(): int
    {
        $sumSalaryFromVideos=0;
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            $SalaryFromVideo=$this->video->getViews()*$this->video->getSalary();
            $sumSalaryFromVideos+=$SalaryFromVideo;
        }
        return $sumSalaryFromVideos;
    }


    public function getPopularVideo(): string
    {
        $maxViews=$this->videos[0]->getViews();
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            if($this->video->getViews()>$maxViews){
                $maxViews=$this->video->getViews();
            }
        }
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            if($this->video->getViews()==$maxViews){
                $popularVideo=$this->video->getName();
                break;
            }
        }
        return $popularVideo;
    }

    public function getSalaryVideo(): string
    {
        $maxSalaryVideo=$this->videos[0]->getSalary()*$this->videos[0]->getViews();
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            $salaryVideo=$this->video->getSalary()*$this->video->getViews();
            if($salaryVideo>$maxSalaryVideo){
                $maxSalaryVideo=$salaryVideo;
            }
        }
        foreach ($this->videos as $video)
        {
            $this->video=$video;
            $salaryVideo=$this->video->getSalary()*$this->video->getViews();
            if($salaryVideo==$maxSalaryVideo){
                $mostSalaryVideo=$this->video->getName();
                break;
            }
        }
        return $mostSalaryVideo;
    }
}

class Video
{
    private string $name;
    private int $views;
    private int $salary;

    public function __construct($name)
    {
        $this->name=$name;
        $this->views = rand(1,10000);
        $this->salary = rand(1,3);
    }
    public function getSalary(): int
    {
        return $this->salary;
    }
    public function getViews(): int
    {
        return $this->views;
    }
    public function getName(): string
    {
        return $this->name;
    }

}
$videosName=[
    "Папич Проходит The Last of Us Remastered",
    "Tiny Bunny (Зайчик)",
    "Каргинов и Коняев: условная критика",
    "Родная речь #5. Мусагалиев, Дедищев, Сысоева",
    "БИОГРАФИИ | ПРИНЦ ГАРРИ “SPARE” | В пересказе англичанина| Джордан, Позов, Сапрыкин, Стахович",
    "БИОГРАФИИ | КОБИ БРАЙАНТ | The mamba mentality| Джабраилов, Позов, Косицын, Стахович"
];
$Videos=[];
foreach ($videosName as $videoName){
    $Videos[]=new Video($videoName);
}

//var_dump($Videos);
$channel=new Channel('NightPodcast',$Videos);
var_dump($channel);
echo "название канала: " . $channel->getChannelName() . "<br>";
echo "список видео: " . "<br>";
var_dump($channel->getVideoList());
echo "общее количество просмотров на канале: " . $channel->getSumViews() . "<br>";
echo "общий доход от канала: " . $channel->getSumSalaryFromVideos() . "<br>";
echo "самое популярное видео на канале: " . $channel->getPopularVideo() . "<br>";
echo "самое доходное видео на канале: " . $channel->getSalaryVideo() . "<br>";
