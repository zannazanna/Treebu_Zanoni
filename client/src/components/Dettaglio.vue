<template>
  <div class="flex flex-row text-xl">
    <div class="flex flex-col w-1/2">
      <img :src="land.foto" class="m-5" />
    </div>

    <div class="flex flex-col w-1/2">
      <div class="grid grid-cols-2 gap-4">
        <div>
          comune:
          <span class="font-bold">{{ land.comune }} </span>
        </div>
        <div>
          dimensione:
          <span class="font-bold">{{ land.dimensione }} </span> ettari
        </div>
         <div>
    foglio_catastale:
  <span class="font-bold">{{land.foglio_catastale}} </span>  
    </div>
     <div>
    mappale_catastale:
  <span class="font-bold">{{land.mappale_catastale}} </span>  
    </div>
     <div>
    parcella_catastale:
  <span class="font-bold">{{land.parcella_catastale}} </span>  
    </div>
     <div>
    terreno:
  <span class="font-bold">{{land.terreno}} </span>  
    </div>
     <div>
    irrigazione:
  <span class="font-bold">{{land.irrigazione}} </span>  
    </div>
     <div>
    offerta:
  <span class="font-bold">{{land.offerta}} </span>  
    </div>
     <div>
    canone:
  <span class="font-bold">{{land.canone}} </span>  
    </div>
     <div>
    diponibilità immediata:
  <span class="font-bold text-green-500" v-if="land.disponibile == true">disponibile </span>  
    <span class="font-bold text-red-500" v-if="land.disponibile == false">non disponibile </span>  

    </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      land: [],
    };
  },
  async mounted() {
    let id = this.$route.params.id;
    let response = await axios.get("http://127.0.0.1:8000/api/land/" + id);
    this.land = response.data;
  },
};
</script>
