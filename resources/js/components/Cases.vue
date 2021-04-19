<template>
<div class="chart-container" style="width:100%;height:100%;">
    <div>
        <hr/>
        <br>
        <h2>Statistics</h2>
        <br>
        <cases-bar
        :label="labels"
        :chart-data="confirmed"
        ></cases-bar>
    </div>
</div>
</template>

<script>
const axios=require("axios")
Vue.component('cases-bar',require('../components/Visuals/CasesBar.vue').default)
export default {
     data : ()=> {
        return {
            labels : [],
            confirmed : [],
        }

    },

    async created() {
  const { data } = await axios.get("http://127.0.0.1:8000/api/restaurants");
  var c=0
  console.log(data)
  for(var i=0;i<20;i++){
    if(data[i]){
            if (data[i].business_name in this.labels){
              continue
            }
            else{
              this.labels.push(data[i].business_name)
              this.confirmed.push(i + 500)
              c=c+1
              if(c==12){
                break
              }
            }
          }
  }
console.log(this.labels)
console.log(this.confirmed)
}
}
</script>
