<?php
header('Content-Type: text/html;charset=utf-8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$guest = array(
    array('id'=>'1','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'108E币'),
    array('id'=>'2','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'109E币'),
    array('id'=>'3','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'102E币'),
    array('id'=>'4','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'10E币'),
    array('id'=>'5','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'98E币'),
    array('id'=>'6','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'138E币'),
    array('id'=>'7','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'128E币'),
    array('id'=>'8','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'77E币'),
    array('id'=>'9','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'13E币'),
    array('id'=>'10','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'68E币'),
);
$pro = array(
    array('id'=>'1','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'108E币'),
    array('id'=>'2','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'109E币'),
    array('id'=>'3','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'102E币'),
    array('id'=>'4','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'10E币'),
    array('id'=>'5','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'98E币'),
    array('id'=>'6','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'138E币'),
    array('id'=>'7','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'128E币'),
    array('id'=>'8','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'77E币'),
    array('id'=>'9','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'13E币'),
    array('id'=>'10','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'68E币'),
);
$audience = array(
    array('id'=>'1','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'108E币'),
    array('id'=>'2','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'109E币'),
    array('id'=>'3','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'102E币'),
    array('id'=>'4','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'10E币'),
    array('id'=>'5','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'98E币'),
    array('id'=>'6','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'138E币'),
    array('id'=>'7','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'128E币'),
    array('id'=>'8','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'77E币'),
    array('id'=>'9','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'13E币'),
    array('id'=>'10','ico'=>'img/icon.png','name'=>'导管室主任','pri'=>'68E币'),
);
$message = array(
    array('id'=>'1','add'=>'left','ico'=>'img/icon.png','name'=>'Lorem lpsum','gf'=>true,'ms'=>false,'zj'=>false,'ding'=>true,'content'=>'最好我们提前半小时开始直1'),
    array('id'=>'2','add'=>'right','ico'=>'img/icon.png','name'=>'Lorem lpsum','gf'=>true,'ms'=>false,'zj'=>false,'ding'=>false,'content'=>'最好我们提前半小时开始直2'),
    array('id'=>'3','add'=>'left','ico'=>'img/icon.png','name'=>'Lorem lpsum','gf'=>false,'ms'=>true,'zj'=>false,'ding'=>false,'content'=>'最好我们提前半小时开始直3'),
    array('id'=>'4','add'=>'right','ico'=>'img/icon.png','name'=>'Lorem lpsum','gf'=>false,'ms'=>false,'zj'=>true,'ding'=>false,'content'=>'最好我们提前半小时开始直播，现在手术室空置，导播看到回复一下我'),
    array('id'=>'5','add'=>'left','ico'=>'img/icon.png','name'=>'Lorem lpsum','gf'=>true,'ms'=>false,'zj'=>false,'ding'=>false,'content'=>'最好我们提前半小时开始直'),
);
$gifs1 = array(
    array('id'=>'1','icon'=>'img/gif_01.png','name'=>'救护车','price'=>10),
    array('id'=>'2','icon'=>'img/gif_02.png','name'=>'口罩','price'=>11),
    array('id'=>'3','icon'=>'img/gif_03.png','name'=>'眼罩','price'=>12),
    array('id'=>'4','icon'=>'img/gif_04.png','name'=>'羽蛇神','price'=>13),
    array('id'=>'5','icon'=>'img/gif_05.png','name'=>'小蓝瓶','price'=>14),
    array('id'=>'6','icon'=>'img/gif_06.png','name'=>'救护车','price'=>15),
);
$gifs2 = array(
    array('id'=>'1','icon'=>'img/gif_01.png','name'=>'救护车','price'=>20),
    array('id'=>'2','icon'=>'img/gif_02.png','name'=>'口罩','price'=>21),
    array('id'=>'3','icon'=>'img/gif_03.png','name'=>'眼罩','price'=>22),
    array('id'=>'4','icon'=>'img/gif_04.png','name'=>'羽蛇神','price'=>23),
    array('id'=>'5','icon'=>'img/gif_05.png','name'=>'小蓝瓶','price'=>24),
    array('id'=>'6','icon'=>'img/gif_06.png','name'=>'救护车','price'=>25),
);
$gifs3 = array(
    array('id'=>'1','icon'=>'img/gif_01.png','name'=>'救护车','price'=>30),
    array('id'=>'2','icon'=>'img/gif_02.png','name'=>'口罩','price'=>31),
    array('id'=>'3','icon'=>'img/gif_03.png','name'=>'眼罩','price'=>32),
    array('id'=>'4','icon'=>'img/gif_04.png','name'=>'羽蛇神','price'=>33),
    array('id'=>'5','icon'=>'img/gif_05.png','name'=>'小蓝瓶','price'=>34),
    array('id'=>'6','icon'=>'img/gif_06.png','name'=>'救护车','price'=>35),
);
$gifs4 = array(
    array('id'=>'1','icon'=>'img/gif_01.png','name'=>'救护车','price'=>30),
    array('id'=>'2','icon'=>'img/gif_02.png','name'=>'口罩','price'=>31),
    array('id'=>'3','icon'=>'img/gif_03.png','name'=>'眼罩','price'=>32),
    array('id'=>'4','icon'=>'img/gif_04.png','name'=>'羽蛇神','price'=>33),
    array('id'=>'5','icon'=>'img/gif_05.png','name'=>'小蓝瓶','price'=>34),
    array('id'=>'6','icon'=>'img/gif_06.png','name'=>'救护车','price'=>35),
);
$gifs5 = array(
    array('id'=>'1','icon'=>'img/gif_01.png','name'=>'救护车','price'=>30),
    array('id'=>'2','icon'=>'img/gif_02.png','name'=>'口罩','price'=>31),
    array('id'=>'3','icon'=>'img/gif_03.png','name'=>'眼罩','price'=>32),
    array('id'=>'4','icon'=>'img/gif_04.png','name'=>'羽蛇神','price'=>33),
    array('id'=>'5','icon'=>'img/gif_05.png','name'=>'小蓝瓶','price'=>34),
    array('id'=>'6','icon'=>'img/gif_06.png','name'=>'救护车','price'=>35),
);
$msg = array(
    array('id'=>'1','msg'=>'11111111','time'=>5,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
    array('id'=>'2','msg'=>'222222','time'=>12,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
    array('id'=>'3','msg'=>'333333333','time'=>20,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
    array('id'=>'4','msg'=>'44444444','time'=>18,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
    array('id'=>'5','msg'=>'555555555','time'=>20,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
    array('id'=>'6','msg'=>'666666','time'=>9,'avatar'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3064584167,3502823640&fm=26&gp=0.jpg'),
);
$vid = array(
    'tit'=>'第101期心血管病危介入治疗专场',
	'num'=>'4950',
);
$tab = array(
    '0'=>'嘉宾',
	'1'=>'产品',
	'2'=>'观众',
);
$video = array(
    'url'=>'http://ivi.bupt.edu.cn/hls/cctv1hd.m3u8',
    'poster'=>'/img/m_ban.png',
);
$haibao = array(
    'head'=>'img/icon.png',
    'name'=>'北冥',
    'banner'=>'img/banner.png',
    'title'=>'心血管病危介入治疗专场',
    'time'=>'2020年10月1日',
    'code'=>'img/code.png',
    'link'=>'www.e-lab.com',
);
$phonecode = array(
    'code'=>'img/code.png',
);
$emoticon = array(
	array('id'=>1,'icon'=>'img/emoticon/爱慕.png'),
    array('id'=>2,'icon'=>'img/emoticon/爱慕.png'),
    array('id'=>3,'icon'=>'img/emoticon/安慰.png'),
    array('id'=>4,'icon'=>'img/emoticon/悲泣.png'),
    array('id'=>5,'icon'=>'img/emoticon/不会吧.png'),
    array('id'=>6,'icon'=>'img/emoticon/财主.png'),
    array('id'=>7,'icon'=>'img/emoticon/大笑.png'),
    array('id'=>8,'icon'=>'img/emoticon/呆若木鸡.png'),
    array('id'=>9,'icon'=>'img/emoticon/飞吻.png'),
    array('id'=>10,'icon'=>'img/emoticon/尴尬.png'),
    array('id'=>11,'icon'=>'img/emoticon/害羞.png'),
    array('id'=>12,'icon'=>'img/emoticon/呼叫.png'),
    array('id'=>13,'icon'=>'img/emoticon/花痴.png'),
    array('id'=>14,'icon'=>'img/emoticon/加油.png'),
    array('id'=>15,'icon'=>'img/emoticon/流口水.png'),
    array('id'=>16,'icon'=>'img/emoticon/亲亲.png'),
    array('id'=>17,'icon'=>'img/emoticon/色情狂.png'),
    array('id'=>18,'icon'=>'img/emoticon/天使.png'),
    array('id'=>19,'icon'=>'img/emoticon/跳舞.png'),
    array('id'=>20,'icon'=>'img/emoticon/偷笑.png'),
    array('id'=>21,'icon'=>'img/emoticon/吐舌头.png'),
    array('id'=>22,'icon'=>'img/emoticon/微信.png'),
    array('id'=>23,'icon'=>'img/emoticon/我的妈呀.png'),
    array('id'=>24,'icon'=>'img/emoticon/享受.png'),
    array('id'=>25,'icon'=>'img/emoticon/疑问.png'),
    array('id'=>26,'icon'=>'img/emoticon/忧伤.png'),
    array('id'=>27,'icon'=>'img/emoticon/晕.png',),
    array('id'=>28,'icon'=>'img/emoticon/再见.png')
);


switch ($_GET['type']) {
	case 'guest':
        echo json_encode(array('code'=>200,data=>$guest));
		break;
	case 'pro':
        echo json_encode(array('code'=>200,data=>$pro));
		break;
	case 'audience':
        echo json_encode(array('code'=>200,data=>$audience));
		break;
	case 'vid':
        echo json_encode(array('code'=>200,data=>$vid));
		break;
	case 'tab':
        echo json_encode(array('code'=>200,data=>$tab));
		break;
	case 'message':
        echo json_encode(array('code'=>200,data=>$message));
		break;
	case 'gifs1':
        echo json_encode(array('code'=>200,data=>$gifs1));
		break;
	case 'gifs2':
        echo json_encode(array('code'=>200,data=>$gifs2));
		break;
	case 'gifs3':
        echo json_encode(array('code'=>200,data=>$gifs3));
		break;
    case 'gifs4':
        echo json_encode(array('code'=>200,data=>$gifs4));
        break;
    case 'gifs5':
        echo json_encode(array('code'=>200,data=>$gifs5));
        break;
	case 'emoticon':
        echo json_encode(array('code'=>200,data=>$emoticon));
		break;
	case 'msg':
        echo json_encode(array('code'=>200,data=>$msg));
		break;
	case 'video':
        echo json_encode(array('code'=>200,data=>$video));
        break;
    case 'haibao':
        echo json_encode(array('code'=>200,data=>$haibao));
        break;
    case 'phonecode':
        echo json_encode(array('code'=>200,data=>$phonecode));
        break;
	default:
		# code...
		break;
}

