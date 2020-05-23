<template>
  <div class="container" style="max-width: 1000px; margin-top: 5rem">
      
    <div class="card card-default">
     <div class="card-header">
               <h2 class="text-center">Ordonnance</h2>
     </div>
     <div class="card-body">
           <div class="row">
        <div class="form-group">
          <label for="dr">D'apres :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Dr.</span>
            </div>
            <input
              type="text"
              v-model="dr"
              class="form-control"
              placeholder="Username"
              id="dr"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="cl">Pour :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <select class="input-group-text" id="basic-addon1">
                <option value="mr">Mr.</option>
                <option value="mdm">Mdm.</option>
              </select>
            </div>
            <select class="form-control" id="cl" v-model="pour">
              <option
                v-for="patient in patients"
                :key="patient.id"
                :value="patient.id"
              >{{ patient.nom+' '+patient.prenom }}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="date">La date :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Le</span>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder="Username"
              v-model="date"
              id="date"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="lieu">le lieu :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Au</span>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder="Username"
              id="lieu"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
          </div>
        </div>
      </div>
      <div class="row text-center">
          <h2>Traitment</h2>
         
      </div>
      <div class="row">
                  <table class="table">
            <tr>
                <th class="col">
                    Meds
                </th>
                <th class="col">
                    Quantité
                </th>
                <th class="col">
                    Periode
                </th>
                <th class="col">
                    Repetition
                </th>
                <th class="col">
                    <button class="btn btn-success btn-sm" @click="meds.push({ name: 'paracetamol',quantity: '2 caché',periode : 'apres dejeune',repetition: 3})">ajouter</button>
                </th>
            </tr>
            <tr v-for="(med,i) in meds" :key="i">
                <td>
                    <input type="text" class="form-control" placeholder="nom de médicament" v-model="med.name">
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="quantité par dose" v-model="med.quantity">
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="periode de consomation" v-model="med.periode">
                </td>
                <td>
                    <input type="number" class="form-control" placeholder="repetiton par journée" v-model="med.repetition">
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" @click="meds.splice(i,1)">supp.</button>
                </td>
            </tr>
        </table>
      </div>

       <div class="row justify-content-center mt-3">
        <button class="btn btn-success" @click="imprimerRapport()">Imprimer</button>
      </div>
     </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["patients"],
  data() {
    return {
      dr: "",
      pour: "",
      date: new Date().getFullYear(),
      lieu: "",
      meds: [
          { 
              name: 'paracetamol',
              quantity: '2 caché',
              periode : "apres dejeune",
              repetition: 3
          },
           { 
               name: 'paracetamol',
              quantity: '2 caché',
              periode : "apres dejeune",
              repetition: 2
          },
           { 
               name: 'paracetamol',
              quantity: '2 caché',
              periode : "apres dejeune",
              repetition: 2
          }
      ]
    };
  },
  methods: {
    async imprimerRapport() {
      const res = await axios({
        url: "/api/ordonnance", //your url
        method: "POST",
        responseType: "blob",
        data: {
          traitment : JSON.stringify(this.meds)
        } // important
      }).then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "rapport.pdf"); //or any other extension
        document.body.appendChild(link);
        link.click();
      });
    }
  }
};
</script>

<style lang="scss">
.card-header {
    background-color: #2af598 !important;
    background-image: linear-gradient(90deg, #08aeea 0%, #2af598 100%) !important;
    color: white;
    h2 {
        margin: 1rem 0;
        text-transform: uppercase;
    }
  
}
  th {
  width: auto !important;
}
</style>