<template>
  <div style="height:100%;">
    <router-view/>
  </div>
</template>

<script>
export default {
  name: '',
  components: {
    
  },
	
}
// window.onload = function() {
//   document.addEventListener('touchstart', function(event) {
//     if (event.touches.length > 1) {
//       event.preventDefault()
//     }
//   })
//   document.addEventListener('gesturestart', function(event) {
//     event.preventDefault()
//   })
// }
</script>

<style>
*{padding:0;margin:0;margin: 0 auto;color: #4a4a4a;}
a{text-decoration: none;}
html{padding: 0;margin: 0;}
[v-cloak]{display: none ! important;}
ul li{list-style-type: none;}
.baberrage-item .baberrage-msg{color: #fff;}
html,body{
	height: 100%;
	background:url(/img/m_bg.png) no-repeat #020e58;background-size:100%;
}
</style>
