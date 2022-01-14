<template>
  <div class="flex flex-col">
    <div class="flex flex-row justify-center items-center p-5">
      <p>ordina per dimensione:</p>
      <button
        class="bg-blue-900 hover:bg-blue-500 text-white px-4 py-2 rounded cursor-pointer mx-5"
        @click="ordineDimensione('ASC')"
      >
        crescente
      </button>
      <button
        class="bg-blue-900 hover:bg-blue-500 text-white px-4 py-2 rounded cursor-pointer"
        @click="ordineDimensione('DESC')"
      >
        decrescente
      </button>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div
        class="flex flex-row border border-2 border-neutral-300 m-5"
        :key="index"
        v-for="(land, index) in lands"
      >
        <div class="flex flex-col w-52 h-52 p-5 items-center">
          <div class="flex flex-row">
            <div>
              <span class="font-bold text-green-500" v-if="land.disponibile == true"
                >disponibile
              </span>
              <span class="font-bold text-red-500" v-if="land.disponibile == false"
                >non disponibile
              </span>
            </div>
          </div>

          <img :src="land.foto" alt="immagine lands" />
        </div>

        <div class="grid grid-cols-2 gap-4 justify-center items-center">
          <p class="mx-2">
            comune: <span class="font-bold"> {{ land.comune }} </span>
          </p>
          <p class="mx-2">
            offerta: <span class="font-bold"> {{ land.offerta }} </span>
          </p>

          <p class="mx-2">
            canone: <span class="font-bold"> {{ land.canone }} </span>
          </p>
          <p class="mx-2">
            dimensione: <span class="font-bold"> {{ land.dimensione }} ettari </span>
          </p>
          <p class="mx-2">
            terreno: <span class="font-bold"> {{ land.terreno }} </span>
          </p>
          <p class="mx-2">
            irrigazione: <span class="font-bold"> {{ land.irrigazione }} </span>
          </p>

          <p>{{ land.descrizione }}</p>
          <div class="flex flex-row justify-center items-center">
            <button
              @click="modifica(land)"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded cursor-pointer mx-5"
            >
              Modifica
            </button>
            <button
              @click="dettaglio(land)"
              class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-2 rounded cursor-pointer"
            >
              dettaglio
            </button>
          </div>
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
      lands: [],
      dimensione: {
        name: "",
      },
    };
  },
  async mounted() {
    let response = await axios.get("http://127.0.0.1:8000/api/land");
    this.lands = response.data;
    console.log(this.lands);
  },
  methods: {
    modifica(lands) {
      this.$router.push("/home/" + lands.id);
    },
    dettaglio(lands) {
      this.$router.push("/dettaglio/" + lands.id);
    },
    async ordineDimensione(ordine) {
      this.dimensione.name = ordine;
      let response = await axios.post(
        "http://127.0.0.1:8000/api/dimensione",
        this.dimensione
      );
      this.lands = response.data;
    },
  },
};
</script>
