<template>
  <div class="rapport container" style="max-width: 1000px; margin-top: 5rem">
    <div class="card card-default">
      <div class="card-header">
        <h2 class="text-center">Rapport Medical</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group email">
            <label for="dr">Email de contact:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
              </div>
              <input
                type="text"
                v-model="email"
                class="form-control"
                placeholder="email"
                id="dr"
                aria-label="email"
                aria-describedby="basic-addon1"
              />
              <div class="form-group memo">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" v-model="memMail" />
                  <label class="form-check-label" for="gridCheck1">mémoriser cette décision</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group tel">
            <label for="cl">Téléphone de contact</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <p
                  class="input-group-text"
                  id="basic-addon1"
                  style="height:100%;padding:0 .5rem;margin:0"
                >
                  <span>Tel</span>
                </p>
              </div>
              <input
                type="text"
                v-model="tel"
                class="form-control"
                placeholder="telephone"
                id="dr"
                aria-label="tel"
                aria-describedby="basic-addon1"
              />
              <div class="form-group memo">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="gridCheck"
                    v-model="memTelephone"
                  />
                  <label class="form-check-label" for="gridCheck">mémoriser cette décision</label>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                placeholder="Votre nom"
                id="dr"
                aria-label="Username"
                aria-describedby="basic-addon1"
              />
            </div>
          </div>
          <div class="form-group">
            <label for="cl">Pour le patient :</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <p
                  class="input-group-text"
                  id="basic-addon1"
                  style="height:100%;padding:0 .2rem;margin:0"
                >
                  <span v-if="pour.gendre=='male'">Mr.</span>
                  <span v-else>Mdm.</span>
                </p>
              </div>
              <select class="form-control" id="cl" v-model="pour">
                <option selected="selected" disabled hidden>Choisir un patient</option>
                <option
                  v-for="patient in patients"
                  :key="patient.id"
                  :value="patient"
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
                <span class="input-group-text" id="basic-addon1">A</span>
              </div>
              <input
                type="text"
                class="form-control"
                placeholder="ville,pays"
                id="lieu"
                v-model="lieu"
                aria-label="Username"
                aria-describedby="basic-addon1"
              />
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Contenu du rapport</label>
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="10"
            v-model="contenu"
            placeholder="Par ex :  Il s'agit d'un cas COVID-19 confirmé..."
          ></textarea>
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
  props: ["patients", "user", "cabinet"],
  mounted() {
    this.email = this.cabinet.email;
    this.dr = this.user.username.slice(3, -1);
    this.tel = this.cabinet["téléphone"];
    this.pour = this.patients[0];
  },
  data() {
    return {
      dr: "",
      pour: "Choisir un patient",
      memTelephone: false,
      memMail: false,
      email: "",
      tel: "",
      date:
        new Date().getDate() +
        "-" +
        (parseInt(new Date().getMonth()) + 1 < 10
          ? "0" + (parseInt(new Date().getMonth()) + 1)
          : parseInt(new Date().getMonth()) + 1) +
        "-" +
        new Date().getFullYear(),
      lieu: "",
      contenu: ""
    };
  },
  methods: {
    async imprimerRapport() {
      const data = {
        dr: this.dr,
        pour: JSON.stringify(this.pour),
        date: this.date,
        lieu: this.lieu,
        contenu: this.contenu,
        email: this.email,
        telephone: this.tel,
        med_id: this.user.id
      };
      if (this.memTelephone) {
        data.mem_tel = this.tel;
      }
      if (this.memMail) {
        data.mem_mail = this.email;
      }
      const res = await axios({
        url: "/api/rapport",
        method: "POST",
        responseType: "blob",
        data
      }).then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "rapport.pdf");
        document.body.appendChild(link);
        link.click();
      });
    }
  }
};
</script>


