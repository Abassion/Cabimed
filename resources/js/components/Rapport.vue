<template>
  <div class="container" style="max-width: 1000px; margin-top: 5rem">
      
    <div class="card card-default">
     <div class="card-header">
               <h2 class="text-center">Rapport Medical</h2>
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
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Contenu du rapport</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" v-model="contenu"></textarea>
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
      contenu: ` Il s’agit de la patiente …………………………, âgée de …………… ans, de groupe ……………qui a été hospitalisée le
                      …………………… au service de Gynécologie pour un cancer du sein droit confirmé par le trépied classique.
                      Il s’agissait d’une tumeur de 7 cm du QSE apparue 10 mois auparavant, avec notion de peau d’orange et de rétraction du mamelon.
                      Classification TNM : T3 N1 M0 Pev0.
                      Une mastectomie radicale modifiée (intervention de Patey) a été pratiquée le ……………… par moi-même.
                      ANA-PATH : carcinome…………………………………………….
                      Une chimiothérapie adjuvante (post-opératoire) a été indiquée (type FAC) : 6 cures.
                      La 6ème cure date du ………………………' `
    };
  },
  methods: {
    async imprimerRapport() {
      const res = await axios({
        url: "/api/rapport", //your url
        method: "POST",
        responseType: "blob",
        data: {
          dr: this.dr,
          pour: this.pour,
          date: this.date,
          lieu: this.lieu,
          contenu: this.contenu
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
</style>