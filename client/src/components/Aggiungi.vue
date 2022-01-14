<template>
<div class="flex flex-col">
  <div class="grid grid-cols-3 gap-4">
    <div class="flex flex-row m-5">
      <label for="comune" class="w-56">comune:</label>
      <input id="comune" v-model="land.comune" class="border w-full" />
      <span v-if="land.comune == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="foto" class="w-56">foto:</label>
      <input id="foto" v-model="land.foto" class="border w-full" />
      <span v-if="land.foto == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="dimensione" class="w-56">dimensione:</label>
      <input
        id="dimensione"
        type="number"
        v-model="land.dimensione"
        class="border w-full"
      />
      <span v-if="land.dimensione == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="foglio_catastale" class="w-56">foglio_catastale:</label>
      <input
        id="foglio_catastale"
        v-model="land.foglio_catastale"
        class="border w-full"
      />
      <span v-if="land.foglio_catastale == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="mappale_catastale" class="w-56">mappale_catastale:</label>
      <input
        id="mappale_catastale"
        v-model="land.mappale_catastale"
        class="border w-full"
      />
      <span v-if="land.mappale_catastale == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="parcella_catastale" class="w-56">parcella_catastale:</label>
      <input
        id="parcella_catastale"
        v-model="land.parcella_catastale"
        class="border w-full"
      />
      <span v-if="land.parcella_catastale == ''" class="text-red-300 mx-5 text-l">
        *</span
      >
    </div>

    <div class="flex flex-row m-5">
      <label for="terreno" class="w-56">terreno:</label>
      <select id="terreno" class="border w-full" v-model="land.terreno">
        <option value="Argilloso">Argilloso</option>
        <option value="Sabbioso">Sabbioso</option>
        <option value="Ghiaioso">Ghiaioso</option>
        <option value="Tufo">Tufo</option>
      </select>
      <span v-if="land.terreno == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="irrigazione" class="w-56">irrigazione:</label>
      <select id="irrigazione" class="border w-full" v-model="land.irrigazione">
        <option value="A scorrimento">A scorrimento</option>
        <option value="Pozzo">Pozzo</option>
        <option value="Canale">Canale</option>
        <option value="Senz'acqua">Senz'acqua</option>
      </select>
      <span v-if="land.irrigazione == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="offerta" class="w-56">tipi di offerta:</label>
      <select id="offerta" class="border w-full" v-model="land.offerta">
        <option value="Vendita">Vendita</option>
        <option value="Affitto">Affitto</option>
        <option value="Affido gratuito">Affido gratuito</option>
      </select>
    </div>

    <div class="flex flex-row m-5" v-if="land.offerta == 'Vendita' || land.offerta == 'Affitto'">
      <label for="canone" class="w-56">canone:</label>
      <input id="canone" type="number" v-model="land.canone" class="border w-full" />
      <span v-if="land.canone == ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5">
      <label for="disponibile" class="w-56">disponibile:</label>
      <input
        id="disponibile"
        type="checkbox"
        v-model="land.disponibile"
        class="border w-full"
      />
    </div>
</div>
    <div v-if="modify == true">
      <div class="flex flex-row justify-center items-center">
        <button
          @click="conferma2()"
          :disabled="!isFormValid"
          :class="{
            'bg-blue-900  hover:bg-blue-500 text-white  px-4 py-2 rounded cursor-pointer': isFormValid,
            'bg-sky-50 text-black  px-4 py-2 rounded cursor-not-allowed': !isFormValid,
          }"
        >
          Conferma
        </button>
      </div>
    </div>

    <div v-if="modify == false">
      <div class="flex flex-row justify-center items-center m-5">
        <button
          @click="conferma()"
          :disabled="!isFormValid"
          :class="{
            'bg-blue-900  hover:bg-blue-500 text-white  px-4 py-2 rounded cursor-pointer': isFormValid,
            'bg-sky-50 text-black  px-4 py-2 rounded cursor-not-allowed': !isFormValid,
          }"
        >
          Conferma
        </button>
      </div>
    </div>

  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      land: {
        comune: "",
        foto: "",
        dimensione: 0,
        foglio_catastale: "",
        mappale_catastale: "",
        parcella_catastale: "",
        terreno: "",
        irrigazione: "",
        offerta: "",
        canone: 0,
        disponibile: false,
      },
      modify: false,
    };
  },
  methods: {
    async conferma() {
                console.log("crea")
                
      await axios.post("http://127.0.0.1:8000/api/create", this.land);
      alert("la land è stata creata");
      this.$router.push("/home");
    },
    async conferma2() {
        console.log("modifica")
      await axios.put("http://127.0.0.1:8000/api/modify/" + this.land.id, this.land);
      alert("la land è stata modificata");
      this.$router.push("/home");
    },
  },
  async mounted() {
    let id = this.$route.params.id;
    if (id != undefined) {
      let response = await axios.get("http://127.0.0.1:8000/api/land/" + id);
      this.land = response.data;
      this.modify = true;
    }
  },
  computed: {
    isFormValid() {
      let valid = false;
      if (
        this.land.comune != "" &&
        this.land.foto != "" &&
        this.land.dimensione != "" &&
        this.land.foglio_catastale != "" &&
        this.land.mappale_catastale != "" &&
        this.land.parcella_catastale != "" &&
        this.land.terreno != "" &&
        this.land.irrigazione != "" &&
        this.land.offerta != ""
      ) {
        valid = true;
      }
      return valid;
    },
  },
};
</script>
