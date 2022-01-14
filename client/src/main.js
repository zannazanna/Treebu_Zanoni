import Vue from 'vue'
import App from './App.vue'
import VueRouter from "vue-router";
import Home from "@/components/Home"
import Aggiungi from "@/components/Aggiungi";
import Dettaglio from "@/components/Dettaglio";



Vue.use(VueRouter);

const routes = [{
  path:"/home",
  component:Home
},
{
  path:"/aggiungi",
  component:Aggiungi
},
{
  path:"/home/:id",
  component:Aggiungi
},
{
  path:"/dettaglio/:id",
  component:Dettaglio
},
{
  path:"",
  redirect:"/home"
}]


const router = new VueRouter({
  mode: "history",
  routes
})

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
