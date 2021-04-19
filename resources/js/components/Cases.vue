<template>
<div>
    <div>
        <hr/>
        <br>
        <h2>Restaurants</h2>
        <br>
        <div class="chart-container" style="width: 100%;height:100%;">
        <CasesBar
        :label="labels"
        :chart-data="opening_hours"
        ></CasesBar>
        </div>
    </div>
</div>
</template>

<script>
const axios=require("axios")
import CasesBar from '../components/Visuals/CasesBar'
export default {
     data : ()=> {
        return {
            labels : ['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'],
            opening_hours : [1,20,50,800,1000,100000,534,45,12,677,800,456],
        }

    },
    components : {
        CasesBar,
    },
//     async created() {
//   const { data } = await axios.get("http://127.0.0.1:8000/api/restaurants");
//   var c=0
//   console.log(data)
//   for(var i=0;i<1000;i++){
//     if(data[i]){
//             if (data[i].business_name in this.labels){
//               continue
//             }
//             else{
//               this.labels.push(data[i].business_name)
//             //   this.opening_hours.push(data[i].opening_hours)
//               c=c+1
//               if(c==12){
//                 break
//               }
//             }
//           }
//   }
// console.log(this.labels)
// }
}
</script>
