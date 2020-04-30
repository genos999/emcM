<template>
	<div id="main">
		<div class="logo">
			<img src="img/logo.png">
		</div>
		<div class="ban">
			<!-- <video muted id='video' class="video-js vjs-default-skin" controls allowfullscreen="true">
	            <source :src="video">    
	        </video> -->
	        <div id="id_test_video" style="width:100%; height:auto;"></div>
	        <div class="title">
	        	<div class="tleft">
	        		<span>{{vid.meetTitle}}</span>
	        	</div>
	        	<div class="tright">
	        		<img src="img/person.png">
					<span v-text='vid.hits' v-cloak></span>
	        	</div>
	        </div>
	        <div class="button">
	        	<img class="bangs" src="img/mbang.png" @click="bang=!bang;notouch=!notouch">
	        	<img class="zan" src="img/mzan.png" @click="gifts=!gifts;notouch=!notouch">
	        </div>
		</div>
		<div class="tab">
			<span :class="active==1?'active':''" @click="active=1">互动聊天</span>
			<span :class="active==2?'active':''" @click="active=2">专家介绍</span>
			<span :class="active==3?'active':''" @click="active=3">活动日程</span>
			<span :class="active==4?'active':''" @click="active=4">免责申明</span>
		</div>
		<div class="chat" v-if="active==1">
			<div class="kuang" id="mesglist">
				<div class="bloak" v-cloak>
					<div v-for="item in message" >
						<div v-if="item.type=='TIMGroupTipElem'" class="line" v-cloak>
							<div class="into" v-if="item.payload.operationType==1">{{item.nick}}加入房间<span>欢迎</span></div>
							<div class="into" v-if="item.payload.operationType==2">{{item.nick}}退出房间<span></span></div>
							<div class="into" v-if="item.payload.operationType==3">{{item.nick}}被踢出房间<span></span></div>
							<div class="into" v-if="item.payload.operationType==4">{{item.nick}}被设为房间管理员<span></span></div>
							<div class="into" v-if="item.payload.operationType==5">{{item.nick}}取消房间管理员<span></span></div>
							<div class="into" v-if="item.payload.operationType==6">房间资料变更<span></span></div>
							<div class="into" v-if="item.payload.operationType==7">房间成员资料变更<span></span></div>
						</div>
						<div v-if="item.type=='TIMTextElem'" class="line" v-cloak>
							<div class="head">
								<img :src="item.avatar?item.avatar:'img/icon.png'" v-cloak>
							</div>
							<div class="rig">
								<span class="name" v-text="item.nick?item.nick:'Guest'"></span>
								<span class="cont" v-text="item.payload.text" v-cloak></span>
							</div>
						</div>
						<div v-if="item.type=='TIMImageElem'" class="line" v-cloak>
							<div class="head">
								<img :src="item.avatar?item.avatar:'img/icon.png'" v-cloak>
							</div>
							<div class="rig">
								<span class="name" v-text="item.nick?item.nick:'Guest'"></span>
								<span class="cont" v-cloak><img :src="item.payload.imageInfoArray[0].imageUrl" v-cloak></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tom">
				<div class="tomsg">
					<div class="lef">
						<input type="text" class="input" v-model="text" @blur="scrool" placeholder="说两句~">
					</div>
					<div class="rig">
						<img class="gif" src="img/msg.png?v=1" @click="friends">
						<img class="gif" src="img/m_mile.png" @click="handleSendImageClick">
						<button @click="addmsg">发送</button>
					</div>
					<input type="file" id="imagePicker" ref="imagePicker" accept=".jpg, .jpeg, .png, .gif" @change="sendImage" style="display:none"/>
				</div>
			</div>
		</div>
		<div class="chat hy" v-else-if="active==2">
			<img src="img/zj1.png">
			<img src="img/zj2.png">
			<img src="img/zj3.png">
			<img src="img/zj4.png">
			<img src="img/zj5.png">
			<img src="img/zj6.png">
			<img src="img/zj7.png">
			<img src="img/zj8.png">
			<img src="img/zj9.png">
			<img src="img/zj10.png">
			<img src="img/zj11.png">
		</div>
		<div class="chat hy" v-else-if="active==3">
			<img src="img/hy1.png">
			<img src="img/hy2.png">
			<img src="img/hy3.png">
		</div>
		<div class="chat hy" v-else>
			<img src="img/sm1.png">
			<img src="img/sm2.png">
			<img src="img/sm3.png">
		</div>
		<div class="notouch" v-if="notouch" @click="closeall"></div>
		<div class="bang" v-if="bang">
			<div style="position:relative;width:100%;height:100%;">
				<a href="javascript:;" @click="paihang"></a>
				<p>排行榜</p>
				<ul>
					<li v-for="(t,i) in guest">
						<span>{{i+1}}</span>
						<span><img src="img/icon.png"></span>
						<span>{{t.NickName}}</span>
						<span>{{t.paly_money}}</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="hudong" v-if="hudong">
			<div style="position:relative;width:100%;height:100%;">
				<a href="javascript:;" @click="friends"></a>
				<p>互动申请</p>
				<label class="top"><input type="text" placeholder="请输入你的名字"></label>
				<label><input type="text" placeholder="请输入你的单位"></label>
				<label><input type="text" placeholder="请输入你的电话"></label>
				<label><textarea placeholder="申请内容"></textarea></label>
				<div class="but">
					<button>提交申请</button>
				</div>
			</div>
		</div>
		<div class="emot" v-if="emot" v-cloak>
			<li v-for="e in emoticon" @click="doemot">
				<img :src="e.icon">
			</li>
		</div>
		<div class="giftlst" v-if="gifts">
			<div class="giftit">
				<span @click="gifshow=1;divIndex=-1;items.price=0;" :class="gifshow==1?'active':''">礼物1</span>
				<span @click="gifshow=2;divIndex=-1;items.price=0;" :class="gifshow==2?'active':''">礼物2</span>
				<span @click="gifshow=3;divIndex=-1;items.price=0;" :class="gifshow==3?'active':''">礼物3</span>
				<span @click="gifshow=4;divIndex=-1;items.price=0;" :class="gifshow==4?'active':''">礼物4</span>
				<span @click="gifshow=5;divIndex=-1;items.price=0;" :class="gifshow==5?'active':''">礼物5</span>
			</div>
			<div class="gifmain">
				<li v-for="(g,i) in gifs1" v-if="gifshow==1" @click="dopostmer(g,$event,i)" :class="divIndex==i?'active':''" v-cloak>
					<img :src="'img/gif_02.png'">
					<span>{{g.productName}}<em>￥ {{g.productPrices}}E</em></span>
					<span class="bak" v-if="divIndex==i?show:!show">
						<img src="img/pus.png" @click="changeNum('-1')">
						<input type="text" v-model="num">
						<img src="img/plus.png" @click="changeNum('1')">
					</span>
				</li>
				<li v-for="(g,i) in gifs2" v-if="gifshow==2" @click="dopostmer(g,$event,i)" :class="divIndex==i?'active':''" v-cloak>
					<img :src="'img/gif_02.png'">
					<span>{{g.productName}}<em>￥ {{g.productPrices}}E</em></span>
					<span class="bak" v-if="divIndex==i?show:!show">
						<img src="img/pus.png" @click="changeNum('-1')">
						<input type="text" v-model="num">
						<img src="img/plus.png" @click="changeNum('1')">
					</span>
				</li>
				<li v-for="(g,i) in gifs3" v-if="gifshow==3" @click="dopostmer(g,$event,i)" :class="divIndex==i?'active':''" v-cloak>
					<img :src="'img/gif_02.png'">
					<span>{{g.productName}}<em>￥ {{g.productPrices}}E</em></span>
					<span class="bak" v-if="divIndex==i?show:!show">
						<img src="img/pus.png" @click="changeNum('-1')">
						<input type="text" v-model="num">
						<img src="img/plus.png" @click="changeNum('1')">
					</span>
				</li>
				<li v-for="(g,i) in gifs4" v-if="gifshow==4" @click="dopostmer(g,$event,i)" :class="divIndex==i?'active':''" v-cloak>
					<img :src="'img/gif_02.png'">
					<span>{{g.productName}}<em>￥ {{g.productPrices}}E</em></span>
					<span class="bak" v-if="divIndex==i?show:!show">
						<img src="img/pus.png" @click="changeNum('-1')">
						<input type="text" v-model="num">
						<img src="img/plus.png" @click="changeNum('1')">
					</span>
				</li>
				<li v-for="(g,i) in gifs5" v-if="gifshow==5" @click="dopostmer(g,$event,i)" :class="divIndex==i?'active':''" v-cloak>
					<img :src="'img/gif_02.png'">
					<span>{{g.productName}}<em>￥ {{g.productPrices}}E</em></span>
					<span class="bak" v-if="divIndex==i?show:!show">
						<img src="img/pus.png" @click="changeNum('-1')">
						<input type="text" v-model="num">
						<img src="img/plus.png" @click="changeNum('1')">
					</span>
				</li>
			</div>
			<div class="line"></div>
			<div class="topline">
				<div style="width:50%;float:left;"></div>
				<div style="width:50%;float:right;">
					<span>总计：{{items.productPrices?items.productPrices*num:0}}E</span>
					<button @click="dogifts">赠送</button>
				</div>
			</div>
		</div>
		<div class="sure" v-if="sure" v-cloak>
			<div class="suremain">
				<a class="close" href="javascript:;" @click="closesure"></a>
				<p>支付</p>
				<ul>
					<li v-for="t in guest" v-cloak>
						<span id="check">
							<input type="checkbox" class="input_check" :id="'check'+t.userGuId">
							<label class="label_check" :for="'check'+t.userGuId"></label>
						</span>
						<img class="head" src="img/icon.png" @click="doimgsure($event,t.userGuId)">
						<span class="span" v-text="t.nickName"></span>
					</li>
				</ul>
				<div class="total">
					<span>￥{{items.productPrices*num}}×{{personnum}}</span>
					<span>￥{{items.productPrices*num*personnum}}</span>
				</div>
				<div class="way">
					<div class="ways">
						<input type="radio" name="echck" value="wechat" checked class="input_check1" id="checks1" v-model="checkedValue">
						<label class="label_check1" for="checks1"></label>
						<img src="img/wechat.png">
						<span>微信支付</span>
					</div>
					<div class="ways">
						<input type="radio" name="echck" value="alipay" class="input_check2" id="checks2" v-model="checkedValue">
						<label class="label_check2" for="checks2"></label>
						<img src="img/alipay.png">
						<span>支付宝</span>
						<a>推荐</a>
					</div>
				</div>
				<div class="ofsure">
					<button @click="payway($event)">确认支付</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import 'lib-flexible'
import videojs from 'video.js'
import 'videojs-contrib-hls'
import 'video.js/dist/video.min.js'
import { TcPlayer } from "tcplayer";
import TIM from 'tim-js-sdk'
import COS from "cos-js-sdk-v5";
import { emojiMap, emojiName, emojiUrl } from '../emoji'
let options = {
  SDKAppID: 1400326220
};
let tim = TIM.create(options);
tim.setLogLevel(1);
tim.registerPlugin({'cos-js-sdk': COS});

export default {
	data(){
	  	return{
	  		vid:[],
	  		acts:true,
	  		notouch:false,
	  		hudong:false,
	  		active:1,
	  		act:1,
	  		gifshow:1,
	  		postmer:false,
	  		sure:false,
	  		text:'',
	  		zan:false,
	  		emot:false,
	  		items:[],
			num:1,
			attr:[],
			personnum:0,
			checkedValue:'',
	  		guest:[],
			gifs1:[],
			gifs2:[],
			gifs3:[],
			gifs4:[],
			gifs5:[],
			emoticon:[],
			url:'http://emcapi.e-lab.cn/m/data.php',
			bang:false,
			gifts:false,
			divIndex:-1,
			show:true,
			MeetId:'',
			UserGuid:'',
			Token:'',
			code:'',
			appid:'wxcdc43043739ca9f6',
			secret:'9d6fde329aafae3be5e73fa97d1f317a',
			redirect_uri:'http://emcapi.e-lab.cn/m/',
			userID:'',
			userSig:'eJwtjd0KgjAAhd9l12HbnM4JXYRhFxmIP0TdhLgZazltShrRuyfm5fnOxzkfkEWp9RIG*ABbEKzmLLnQvazkjJv2*E6Gexde949xW15oFUTqWTNEqVr8jquibSUHPiIQ2tjFGP4bMbbSCOC7kHhwYb2sJ4Icz4Ougzy2bMjbdFbo3NhxeOJ5U2YHZyA7u0SUkRoruk5So86BjtnLxVptwPcHH884HA__',
			message:[],
			groupId:'@TGS#2EQX7LLGE'
	  	}
	},
	methods:{
		login:function(){
			var thar = this;
			var o = {
				'userGuId' : 'so json 在线工具',
				'identId' : 80,
				'UserPhone' : '13611869987',
				'NickName' : 's三台',
				'Avatar' : 'www.baidu.com',
				'Score' : 0,
				'AccountBalance' : 33,
				'GroupId' : '111',
				'UserName' : '13588889999',
				'UserRank' : '',
			};
			this.$axios({
				method:'post',
				url:'http://emcapi.e-lab.cn:12315/api/EMcLogin/Login',
				data:o,
			}).
			then((res)=>{
				res = res.data;
				thar.UserGuid = res.data.userGuId;
	  			thar.Token = res.token;
	  			window.localStorage.setItem('UserGuid', res.data.userGuId);
	  			window.localStorage.setItem('Token', res.token);
	  			
			},(err)=>{
			    console.log(err);
			})
		},
		getInfo:function(){
			var thar = this;
			this.$axios({
				method:'get',
				url:'http://emcapi.e-lab.cn:12315/api/EMc/MeetingsDetails/'+thar.MeetId,
				headers:{
					'UserGuid':window.localStorage.getItem('UserGuid'),
					'Authorization':'Bearer '+window.localStorage.getItem('Token'),
				},
			}).
			then((res)=>{
				thar.vid = res.data.data[0];
				var player = new TcPlayer("id_test_video", {
				  // m3u8: res.data.data[0].pushStraeamAddress,
				  m3u8: 'http://ivi.bupt.edu.cn/hls/cctv1hd.m3u8',//上线替换上面
				  autoplay: false,//自动播放
				  // poster: res.data.data[0].MeetBackground,
				  poster: '/img/m_ban.png',//上线替换上面
				  width: "100%",
				  height: "100%"
				});
			},(err)=>{
			    console.log(err);
			})
		},
		closeall:function(){
			var thar = this;
			thar.gifts = false;
			thar.hudong = false;
			thar.bang = false;
			thar.zan = false;
			thar.sure = false;
			thar.emot=false;
			thar.notouch = !thar.notouch;
		},
		dogifts:function(){
			var thar = this;
			thar.zan = false;
			thar.sure = true;
			thar.gifts = !thar.gifts;
		},
		friends:function(){
			var thar = this;
			thar.hudong = !thar.hudong;
			thar.notouch = !thar.notouch;
		},
		paihang:function(){
			var thar = this;
			thar.bang = !thar.bang;
			thar.notouch = !thar.notouch;
		},
		getGuest:function(){
			var thar = this;
			this.$axios({
		        method:'get',
		        url:'http://emcapi.e-lab.cn:12315/api/EMc/MeetingTop/'+thar.MeetId+'/PlayTour',
		        headers:{
		          'UserGuid':window.localStorage.getItem('UserGuid'),
		          'Authorization':'Bearer '+window.localStorage.getItem('Token'),
		        },
		      }).
		      then((res)=>{
		        thar.guest = res.data.data;
		      },(err)=>{
		          console.log(err);
		      })
		},
		getGifts:function(){
	  		var thar = this;
	  		this.$axios({
				method:'get',
				url:'http://emcapi.e-lab.cn:12315/api/EMc/GiftProduct',
				headers:{
					'UserGuid':window.localStorage.getItem('UserGuid'),
					'Authorization':'Bearer '+window.localStorage.getItem('Token'),
				},
			}).
			then((res)=>{
				var arr = [];
				arr = res.data.data;
				for(var i=0;i<arr.length;i++){
					if(arr[i]['groupId']==1){
						thar.gifs1.push(arr[i]);
					}else if(arr[i]['groupId']==2){
						thar.gifs2.push(arr[i]);
					}else if(arr[i]['groupId']==3){
						thar.gifs3.push(arr[i]);
					}else if(arr[i]['groupId']==4){
						thar.gifs4.push(arr[i]);
					}else{
						thar.gifs5.push(arr[i]);
					}
				}
				console.log(res.data);
			},(err)=>{
			    console.log(err);
			})
	  	},
		getEmoticon:function(){
			var thar = this;
			this.$axios({
			    method:"get",
			    url:thar.url,
			    params:{type:'emoticon'}
			}).
			then((res)=>{
			    thar.emoticon = res.data.data;
			},(err)=>{
			    console.log(err);
			})
		},
		sures:function(){
			var thar = this;
			thar.sure=true;
			thar.postmer=false;
		},
		check:function(e){
			var thar = this;
			if(this.$refs.check.checked){
				thar.barrageIsShow = false;
			}else{
				this.addToList();
				thar.barrageIsShow = true;
			}
		},
		page:function(i){
			var thar = this;
			i = Number(i);
			if(thar.gifshow+i < 1){
				thar.gifshow = 3;
			}else if(thar.gifshow+i > 3){
				thar.gifshow = 1;
			}else{
				thar.gifshow = thar.gifshow+i;
			}
		},
		payway:function(e){
			var thar = this;
			if(thar.checkedValue=='wechat'){
				thar.paywx();
			}else{
				alert("请在浏览器中打开");
			}
		},
		paywx:function(){
			var thar = this;
			var productId = thar.items.productId;
			var productName = thar.items.productName;
			var productPrices = thar.items.productPrices*thar.num*thar.personnum;
			this.$axios({
			method:'get',
				url:'http://emcapi.e-lab.cn:12315/api/EMcPay/WxPay/'+productId+'/'+productName+'/'+productPrices,
				headers:{
					'UserGuid':window.localStorage.getItem('UserGuid'),
					'Authorization':'Bearer '+window.localStorage.getItem('Token'),
				},
			}).
			then((res)=>{
				thar.wxPayData = res.data.data;
				thar.pay = !thar.pay;
				thar.sure = !thar.sure;
				console.log(res.data.data.wx_qrcode);
				window.location.href=res.data.data.wx_qrcode
			},(err)=>{
			    console.log(err);
			})
		},
		doimgsure:function(e,UserGuId){
			var thar = this;
			var change = true;
			if(e.currentTarget.parentElement.firstElementChild.firstElementChild.checked==false){
				e.currentTarget.parentElement.firstElementChild.firstElementChild.checked = true;
				thar.attr.push(UserGuId);
			}else{
				e.currentTarget.parentElement.firstElementChild.firstElementChild.checked = false;
				for(var i=0;i<thar.attr.length;i++){
					if(thar.attr[i]==UserGuId){
						thar.attr.splice(i,1);
					}
				}
			}
			//小->大排序
			for (var i = 0; i < thar.attr.length; i++) {
				for (var j = 0; j < thar.attr.length; j++) {
					if (thar.attr[i] < thar.attr[j]) {
						var h;
						h = thar.attr[i];
						thar.attr[i] = thar.attr[j];
						thar.attr[j] = h;
					}
				}
			}
			thar.personnum = thar.attr.length;
		},
		closesure:function(){
			var thar = this;
			thar.sure = false;
			thar.postmer = false;
			thar.zan = false;
			thar.notouch = !thar.notouch;
		},
		changeNum:function(i){
			var thar = this;
			i = Number(i);
			if(thar.num+i<1){
				thar.num = 1;
			}else{
				thar.num = thar.num+i;
			}
		},
		dopostmer:function(o,e,i){
			var thar = this;
			thar.items = o;
			thar.divIndex=i;
		},
		dogift:function(){
			var thar = this;
			if(thar.zan){
				thar.zan=false;
			}else{
				thar.zan = true;
			}
			thar.emot=false;
			thar.notouch = !thar.notouch;
		},
		doemot:function(){
			var thar = this;
			if(thar.emot){
				thar.emot = false;
			}else{
				thar.emot = true;
			}
			thar.zan = false;
			thar.notouch = !thar.notouch;
		},
		getAccessToken:function(){
			var thar = this;
			var urls = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='+thar.appid+'&secret='+thar.secret+'&code='+thar.code+'&grant_type=authorization_code';
			this.$axios({
			    method:"get",
			    url:'http://emcapi.e-lab.cn/data.php',
			    params:{type:'code',url:urls}
			}).
			then((res)=>{
				if(res.data.code==200){
					thar.userInfo = res.data.data;
					this.getSign();
				}
			},(err)=>{
			    console.log(err);
			})
		},
		getSign:function(){
			var thar = this;
			var o = {
				OpenId:thar.userInfo.openid,
				NickName:thar.userInfo.nickname,
				HeadImgUrl:thar.userInfo.headimgurl,
			};
			this.$axios({
			    method:"post",
			    url:'http://productelab.e-lab.cn/app/server/user/wxsign',
			    data:o
			}).
			then((res)=>{
				if(res.data.statusCode=='000000'){
					// thar.userSig = res.data.data.userSign;//获取正式秘钥
					this.loginTim();
				}
			},(err)=>{
			    console.log(err);
			})
		},
		loginTim:function(){
			var thar = this;
			let promise = tim.login({userID: thar.userInfo.openid, userSig: thar.userSig});
			promise.then(function(imResponse) {
				thar.setMyProfile();
			  	thar.getHisMsg();
			  	thar.getMyProfile();
			}).catch(function(imError) {
			  console.warn('login error:', imError);
			});
		},
		setMyProfile:function(){
			var thar = this;
			let sex;
			if(thar.userInfo.sex==1){
				sex = TIM.TYPES.GENDER_MALE;
			}else{
				sex = TIM.TYPES.GENDER_FEMALE;
			}
			let onSdkReady = function(event) {
			  	let promise = tim.updateMyProfile({
				  nick: thar.userInfo.nickname,
				  avatar: thar.userInfo.headimgurl,
				  gender: sex,
				  selfSignature: '',
				  allowType: TIM.TYPES.ALLOW_TYPE_ALLOW_ANY
				});
				promise.then(function(imResponse) {
				  
				}).catch(function(imError) {
				  console.warn('updateMyProfile error:', imError); // 更新资料失败的相关信息
				});
			};
			tim.on(TIM.EVENT.SDK_READY, onSdkReady);
		},
		getMyProfile:function(){
			var thar = this;
			let onSdkReady = function(event) {
				let promise = tim.getMyProfile();
				promise.then(function(imResponse) {
				  
				}).catch(function(imError) {
				  console.warn('getMyProfile error:', imError); // 获取个人资料失败的相关信息
				});
			}
			tim.on(TIM.EVENT.SDK_READY, onSdkReady);
		},
		getHisMsg:function(){
			var thar = this;
			let onSdkReady = function(event) {
			  let promise = tim.getMessageList({conversationID: 'GROUP'+thar.groupId, count: 15});
				promise.then(function(imResponse) {
				  const messageList = imResponse.data.messageList; // 消息列表。
				  const nextReqMessageID = imResponse.data.nextReqMessageID; // 用于续拉，分页续拉时需传入该字段。
				  const isCompleted = imResponse.data.isCompleted; // 表示是否已经拉完所有消息。
				  let arr = [];
				  for(var k in messageList){
				  	arr.push(messageList[k]);
				  }
				  thar.message = arr;
				  console.log(thar.message);
				});
			};
			tim.on(TIM.EVENT.SDK_READY, onSdkReady);
			thar.getMessage();
		},
		getMessage:function(){
			var thar = this;
			let onMessageReceived = function(event) {
				let res = event.data[0];
				console.log(res);
			  	thar.message.push(res);
			};
			tim.on(TIM.EVENT.MESSAGE_RECEIVED, onMessageReceived);
		},
		addmsg:function(){
			var thar = this;
			let message = tim.createTextMessage({
			  to: thar.groupId,
			  conversationType: TIM.TYPES.CONV_GROUP,
			  payload: {
			    text: thar.text
			  }
			});
			let promise = tim.sendMessage(message);
			promise.then(function(imResponse) {
			  // 发送成功
			  let res = imResponse.data.message;
			  res['avatar'] = thar.userInfo.headimgurl;
			  res['nick'] = thar.userInfo.nickname;
			  thar.message.push(res);
			  thar.text="";
			}).catch(function(imError) {
			  // 发送失败
			  console.warn('sendMessage error:', imError);
			});
		},
		handleSendImageClick:function(){
			var thar = this;
			if(thar.code){
				this.$refs.imagePicker.click();
			}else{
				alert("请登录");
			}
		},
		sendImage:function(){
			var thar = this;
		    let message = tim.createImageMessage({
		        to: thar.groupId,
		        conversationType: TIM.TYPES.CONV_GROUP,
		        payload: {
		          file: document.getElementById('imagePicker')
		        },
		        onProgress: function(event) {
		        	console.log('file uploading:', event) 
		        }
		    })
	      	let promise = tim.sendMessage(message);
			promise.then(function(imResponse) {
			  console.log(imResponse);
			  let res = imResponse.data.message;
			  res['avatar'] = thar.userInfo.headimgurl;
			  res['nick'] = thar.userInfo.nickname;
			  thar.message.push(res);
			}).catch(function(imError) {
			  console.warn('sendMessage error:', imError);
			});
	    },
	    scrool:function(){
	    	window.scroll(0,0);
	    }
	},
	mounted(){
		var useragent = navigator.userAgent;
		if(useragent.match(/MicroMessenger/i) != 'MicroMessenger') {
			alert("请在微信打开此页面");
		    var opened = window.open('about:blank', '_self');
		    opened.opener = null;
		    opened.close();
		}else{
			if(this.$utils.getUrlKey("code")){
	      		this.code = this.$utils.getUrlKey("code");
	      		this.getAccessToken();
	      	}else{
	      		let wxurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid="+this.appid+"&redirect_uri="+this.redirect_uri+"&response_type=code&scope=snsapi_userinfo&state=11#wechat_redirect";
	      		window.location.href=wxurl;
	      	}
		}
	},
	created(){
		this.MeetId = this.$utils.getUrlKey("MeetId") || '4733412023323097580';
		this.login();
		this.getInfo();
		this.getGuest();
		this.getGifts();
		this.getEmoticon();
	},
	updated(){
    	let ele = document.getElementById('mesglist');
    	ele.scrollTop = ele.scrollHeight;
    }
}
</script>
<style scoped>
#main{height: 100%;}
.logo{width: 60%;padding-top: 25px;margin:0 auto;}
.logo span{text-align: center;color: #bdbdbd;font-size: 20px;display: block;margin-bottom: 10px;}
.logo img{width: 100%;}
.ban{margin-top: 20px;position: relative;}
.ban .button{position: absolute;bottom: 17px;right: 80px;}
.ban .button img{border-radius: 12px;width: 100px;margin:0 10px;cursor: pointer;}
.tab{margin-top: 10px;height: 70px;line-height: 70px;}
.tab span{width: 25%;text-align: center;display: block;float: left;background: #001150;color: #fff;font-size: 23px;position: relative;}
.tab span.active{background: #142b9e;border-bottom: 4px solid #16b1f4;border-radius: 1px;}
.chat{margin-top:5px;}
.chat .kuang{padding: 1px 40px;overflow: auto;height: 400px;max-height:500px;min-height: 400px;}
.chat .kuang .into{text-align: center;display: table;background: #001150;margin: 0 auto;padding: 3px 18px;border-radius: 20px;margin-top: 30px;}
.chat .kuang .into span{color: #16b1f4;padding-left: 20px;}
.chat .kuang .bloak{margin:10px 0;clear: both;clear: both;display: table;}
.chat .kuang .bloak .head{width: 8%;float: left;}
.chat .kuang .bloak .head img{width: 40px;}
.chat .kuang .bloak .rig{width: 87%;}
.chat .kuang .bloak .rig span{color: #fff;}
.chat .kuang .bloak .rig .zj{background: #16b1f4;margin-left: 15px;padding: 2px 6px;border-radius: 10px;}
.chat .kuang .bloak .rig .ms{background: #fd83b2;margin-left: 15px;padding: 2px 6px;border-radius: 10px;}
.chat .kuang .bloak .rig .xt{background: #16b1f4;margin-left: 15px;padding: 2px 6px;border-radius: 10px;}
.chat .kuang .bloak .rig .cont{display: block;width:100%;margin-left: 3px;margin-top: 10px;background: #2c3ea9;padding: 10px 20px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;margin-bottom: 20px;}
.chat .tom{position: relative;}
.chat .tomsg{background-image: linear-gradient(to right , #0737b7, #001f73);height: 80px;line-height:80px;width: -webkit-fill-available;position: fixed;bottom: 30px;padding: 0 20px;}
.chat .tomsg .own{width: 50px;}
.chat .tomsg .gif{width: 50px;margin-right: 18px;vertical-align: middle;}
.chat .tomsg .gif:nth-child(1){width: 60px;}
.chat .tomsg input.input{height: 80px;line-height:80px;font-size: 24px;width: 100%;outline: none;background: none;border: none;color: #fff;}
.chat .tomsg .lef{width: 65%;float: left;}
.chat .tomsg .rig{width: 35%;float: right;}
.chat .tomsg .rig button{border:none;outline: none;background:#02a8e1;color:#fff;padding:5px 20px;border-radius: 8px;font-size: 24px;}
.hy img{width: 100%;vertical-align: bottom;}
.gift{position: absolute;width: 100%;height: auto;background: #292b38;border-radius: 10px;left: 0;bottom: 62px;}
.gift li{width: 78px;height: 70px;float:left;list-style-type: none;position: relative;cursor: pointer;overflow: hidden;}
.gift li img{width: 100%;}
.gift li span{position: absolute;bottom: -27px;font-size: 12px;left: 33px;}
.emot{position: absolute;width: 100%;height: auto;background: #142a6f;left: 0;bottom: 110px;}
.emot li{width: 20%;height: 150px;float:left;list-style-type: none;position: relative;cursor: pointer;overflow: hidden;}
.emot li img{width: 100%;}
.gift{position: absolute;width: 100%;height: auto;background: #102061;border-radius: 10px;left: 0px;bottom: 60px;padding:0;opacity: 0.97;margin: 0 auto;}
.gift .giftit{width: 100%;height: 40px;line-height: 40px;text-align: center;}
.gift .giftit span{width: 33.33%;display: block;float: left;cursor: pointer;color: #fff;}
.gift .giftit span.active{color: #29abe2;}
.gift .pre{float: left;width: 10%;margin-top: 20%;}
.gift .next{float: right;width: 10%;margin-top: 20%;}
.gift .pre img{float: left;cursor: pointer;}
.gift .next img{float: right;cursor: pointer;}
.gift .gifmain{margin: 0 auto;width: 80%;float: left;height: 220px;}
.gift .gifmain li{width: 33.3%;height: 110px;float:left;list-style-type: none;position: relative;cursor: pointer;background: #102061;}
.gift .gifmain li:hover{background: #001150;}
.gift .gifmain li img{width: 100%;height: 110px;}
.gift .gifmain li span{position: absolute;bottom: -27px;font-size: 12px;left: 33px;}
.blue {border-radius: 100px;background: #e6ff75;color: #fff;}
.green {border-radius: 100px;background: #75ffcd;color: #fff;}
.red {border-radius: 100px;background: #e68fba;color: #fff;}
.yellow {border-radius: 100px;background: #dfc795;color: #fff;}
.baberrage-stage {position: absolute;width: 100%;height: 450px;overflow: hidden;top: 0;font-size: 15px;}
/*.emot{position: absolute;width: 485px;height: auto;background: #e0e0e0;left: -160px;bottom: 40px;border-radius: 10px;}*/
/*.emot li{width: 78px;height: 70px;float:left;list-style-type: none;position: relative;cursor: pointer;overflow: hidden;}*/
/*.emot li img{width: 100%;cursor: pointer;}*/
/*.emot li img:hover{background: #b5b5b5;border-radius: 10px;}*/
.postmer{position: absolute;background: #2c3ea9;width: 270px;height: 140px;top: -160px;left: 90px;border-radius: 15px;}
.postmer:before{content: "";position: absolute;width: 0;height: 0;border: 15px solid transparent;border-top-color: #2c3ea9;left: 50%;margin-left: -12px;bottom: -30px;}
.postmer .imgleft{width: 50%;float: left;}
.postmer .imgleft img{margin-top: 15%;width: 100%;}
.postmer .imgright{width: 45%;float: left;padding:5px 0px 0 0;}
.postmer .imgright span{display: block;height: 30px;line-height: 30px;clear:both;}
.postmer .imgright span:nth-child(1){color: #fff;font-size: 15px;}
.postmer .imgright span:nth-child(2){color: #ffea02;font-size: 14px;}
.postmer .imgright span:nth-child(3){color: #fff;font-size: 13px;}
.postmer .imgright span:nth-child(4){color: #ffea02;font-size: 14px;}
.postmer .imgright img{cursor: pointer;}
.postmer .imgright img:nth-child(1){margin-left: 2px;}
.postmer .imgright input{width: 20px;margin:0 2px;border:none;outline: none;background: none;color: #fff;text-align: center;font-size: 12px;height: 30px;line-height: 30px;}
.postmer .imgright span button{font-size: 12px;border:none;background: #102061;color: #fff;padding: 2px 5px;border-radius: 5px;float: right;margin-top: 4px;outline: none;cursor: pointer;}
.sure{position: absolute;background: url('/img/pay.png') no-repeat;width: 550px;height: 880px;top: 50%;left: 50%;margin-left:-275px;margin-top:-440px;background-size: 100%;border-radius: 25px;}
.sure .suremain{position: relative;width: 100%;height: 100%;}
.sure .suremain .close{position: absolute;right: 10px;top: 10px;cursor:pointer;}
.sure .suremain p{color: #fff;font-size: 36px;text-align: center;padding-top: 30px;letter-spacing: 10px;}
.sure .suremain ul{padding:0 10px;height: 518px;overflow: auto;margin-top: 30px;}
.sure .suremain ul li{margin-top:10px;width: 33.33%;text-align: center;background: none;height: 120px;float: left;line-height: 80px;position: relative;}
.sure .suremain ul li:hover{background: none;}
.sure .suremain ul li img.head{width: 60px;height: auto;margin:0 auto;display: block;cursor: pointer;}
.sure .suremain ul li span.span{display: block;color: #000;font-size: 26px;margin-right: 0;height: 50px;line-height: 50px;}
.sure .suremain a.close{position: absolute;right: 0;top: 0;width: 100px;height: 100px;}
#check {margin: 20px auto;}
#check .input_check {position: absolute;width: 20px;height: 20px;visibility: hidden;background: #E92333;}
#check span {position: relative;}
#check .input_check+label.label_check {display: inline-block;width: 27px;height: 27px;background: url('/img/sure.png') no-repeat;background-position: -31px -3px;position: absolute;top: 0;right: 47px;}
#check .input_check:checked+label.label_check {background-position: -2px 0px;}
.sure .suremain .total{padding: 0px 40px;margin-top: 10px;height: auto;}
.sure .suremain .total span{width: 50%;}
.sure .suremain .total span:nth-child(1){color: #969696;font-size: 35px;float: left;}
.sure .suremain .total span:nth-child(2){color: #bb0e57;font-size: 45px;float: right;text-align: right;}
.way{clear: both;padding:0 10px;margin-top: 0px;display: inline-block;width: 92%;position: relative;}
.way .ways:nth-child(1){width: 45%;float: left;} 
.way .ways:nth-child(2){width: 55%;float: left;} 
.way .ways:nth-child(2) img{margin-left: 60px;}
.way .ways img{width:40px;}
.way .ways img{vertical-align: bottom;margin:0 5px;margin-left: 80px;}
.way .input_check1,.way .input_check2 {position: absolute;width: 15px;height: 15px;visibility: hidden;background: #E92333;}
.way .input_check1+label.label_check1{display: inline-block;width: 20px;height: 20px;background: url('/img/sure1.png') no-repeat;background-size:100%;background-position: -30px 0px;position: absolute;top: 50%;margin-top:-10px;left: 55px;border:1px solid #ff0267;border-radius: 50%;cursor: pointer;}
.way .input_check2+label.label_check2 {display: inline-block;width: 20px;height: 20px;background: url('/img/sure1.png') no-repeat;background-size:100%;background-position: -40px -3px;position: absolute;top: 50%;margin-top:-10px;left: 260px;border:1px solid #ff0267;border-radius: 50%;cursor: pointer;}
.way .input_check1:checked+label.label_check1,.way .input_check2:checked+label.label_check2 {background-position: 0px 0px;}
.way .ways span{color: #000;font-size: 26px;height: 40px;line-height: 40px;}
.way .ways a{color: #fff;background: #00aaee;font-size: 26px;padding: 0px 20px;border-radius: 10px;text-align: right;margin-left: 5px;}
.ofsure{clear:both;height: 70px;line-height:70px;margin-top: 15px;}
.ofsure button{clear:both;width: 80%;background: #00aaee;color: #fff;height: 70px;line-height: 70px;border:none;outline: none;border-radius: 10px;margin: 0 auto;display: block;cursor: pointer;font-size: 28px;}
input::-webkit-input-placeholder{
    color:#fff;
}
input::-moz-placeholder{   /* Mozilla Firefox 19+ */
    color:#fff;
}
input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
    color:#fff;
}
input:-ms-input-placeholder{  /* Internet Explorer 10-11 */ 
    color:#fff;
}
.hudong{background:url(/img/hudong.png) no-repeat;background-size: 100%;position: absolute;left: 50%;top: 50%;width: 550px;height: 732px;margin-left: -275px;margin-top: -316px;}
.hudong p{color: #fff;font-size: 36px;text-align: center;padding-top: 50px;}
.hudong label{display: block;}
.hudong label.top{margin-top: 100px;}
.hudong label input,.hudong label textarea{border:none;border-bottom: 1px solid #15b0e9;background:none;color: #b7b7b7;width: 80%;margin:30px auto;display: block;height: 60px;line-height: 60px;font-size: 28px;outline: none;}
.hudong label textarea{height:100px;}
.hudong input::-webkit-input-placeholder,.hudong textarea::-webkit-input-placeholder{
    color:#b7b7b7;
}
.hudong input::-moz-placeholder,.hudong textarea::-webkit-input-placeholder{   /* Mozilla Firefox 19+ */
    color:#b7b7b7;
}
.hudong input:-moz-placeholder,.hudong textarea::-webkit-input-placeholder{    /* Mozilla Firefox 4 to 18 */
    color:#b7b7b7;
}
.hudong input:-ms-input-placeholder,.hudong textarea::-webkit-input-placeholder{  /* Internet Explorer 10-11 */ 
    color:#b7b7b7;
}
.hudong .but button{width: 100%;background:#15b0e9;color: #fff;border:none;outline: none;width: 80%;margin: 0 auto;display: block;height: 80px;line-height: 80px;font-size: 30px;border-radius: 10px;}
.hudong a{position: absolute;top: 0;right: 0;width: 100px;height: 100px;}
.giftlst{position: absolute;bottom: 0;left: 0;width: 100%;background: #fff;height: 530px;border-top-right-radius: 10px;border-top-left-radius: 10px;}
.giftlst .giftit{height: 60px;width: 100%;}
.giftlst .giftit span{width: 20%;height: 60px;line-height: 60px;text-align: center;display: block;float: left;font-size: 23px;}
.giftlst .giftit span.active{color: #24b1dd;border-bottom: 1px solid #24b1dd;}
.giftlst .gifmain{margin: 0 auto;width: 90%;height: auto;margin-top: 20px;}
.giftlst .gifmain li{width: 33.2%;height: 160px;float:left;list-style-type: none;cursor: pointer;}
.giftlst .gifmain li.active{border:1px solid #ff0468;height: 158px;border-bottom: none;}
.giftlst .gifmain li img{width: 100%;height: 90px;}
.giftlst .gifmain li span{font-size: 24px;width: 100%;line-height: 40px;height:40px;text-align: center;display: block;}
.giftlst .gifmain li span em{color: #29abe2;font-style:normal}
.giftlst .gifmain li span.bak{background:#ff0468;width: 101%;height: 40px;display: block;}
.giftlst .gifmain li span.bak img{width: 30px;height: auto;vertical-align: middle;margin-top: 5px;}
.giftlst .gifmain li span.bak img:nth-child(1){float: left;padding-left: 15px;}
.giftlst .gifmain li span.bak img:nth-child(3){float: right;padding-right: 15px;}
.giftlst .gifmain li span.bak input{border:none;width: 30px;text-align: center;background:none;outline: none;margin-left: 10px;color: #fff;line-height: 30px;}
.giftlst .gifmain li:nth-child(1),.giftlst .gifmain li:nth-child(4){clear: both;}
.giftlst .gifmain li:nth-child(4),.giftlst .gifmain li:nth-child(5),.giftlst .gifmain li:nth-child(6){margin-top: 25px;}
.giftlst .line{height: 30px;clear: both;}
.giftlst .topline{clear:both;width: 100%;border-top: 1px solid #ccc;padding-top: 15px;}
.giftlst .topline span{font-size: 28px;vertical-align: middle;}
.giftlst .topline button{border:none;outline: none;font-size: 24px;background:#ff0468;color: #fff;padding: 5px 20px;border-radius: 5px;margin-left: 25px;cursor: pointer;}
.notouch{position: absolute;left: 0;top: 0;width: 100%;height: 100%;background: black;opacity: 0.7;}
.bang{background:url(/img/hudong.png) no-repeat;background-size: 100%;position: absolute;left: 50%;top: 50%;width: 550px;height: 732px;margin-left: -275px;margin-top: -316px;}
.bang p{color: #fff;font-size: 36px;text-align: center;padding-top: 50px;}
.bang ul{height: 610px;overflow: hidden;overflow-y: scroll;}
.bang ul li{overflow: hidden;font-size: 17px;background: #02a8e1;height: 60px;line-height: 60px;margin: 10px auto;width: 92%;border-radius: 10px;}
.bang ul li span img{width: 40px;vertical-align: text-top;}
.bang ul li span{color: #fff;}
.bang ul li span:nth-child(1){width: 10%;display: block;float: left;padding-left: 20px;font-size: 24px;}
.bang ul li span:nth-child(2){width: 15%;display: block;float: left;}
.bang ul li span:nth-child(3){width: 50%;display: block;float: left;font-size: 24px;}
.bang ul li span:nth-child(4){text-align: right;display: block;padding-right: 15px;font-size: 24px;}
.bang a{position: absolute;top: 0;right: 0;width: 100px;height: 100px;}
.ban .title{position: absolute;top: 0;left: 0;height: 60px;line-height: 60px;background: #000;opacity: 0.6;width: 100%;}
.ban .title span{color: #fff;height: 60px;line-height: 60px;font-size: 26px;}
.ban .title .tleft{width: 70%;float: left;padding-left: 15px;}
.ban .title .tright{width: 20%;float: right;padding-right: 15px;text-align: right;}
.ban .title img{vertical-align: sub;width: 40px;margin-right: 10px;}
#id_test_video{min-height:300px;}
#mesglist .left{}
#mesglist .right{}
#mesglist .cont img{width: 25%;}
#mesglist .line{clear: both;width: 100%;}
</style>