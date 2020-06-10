<template>
  <div class="ordonnance container" style="max-width: 1000px; margin-top: 5rem">
    <div class="card card-default">
      <div class="card-header">
        <h2 class="text-center">Ordonnance</h2>
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
                <option value selected hidden disabled>Choisir un patient</option>
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
                placeholder="la date d'ordonnance"
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
                placeholder="Pays,ville"
                v-model="lieu"
                id="lieu"
                aria-describedby="basic-addon1"
              />
            </div>
          </div>
        </div>
        <div class="row text-center">
          <h2>Traitement</h2>
        </div>
        <div class="row">
          <table class="table">
            <tr>
              <th class="col">Médicaments</th>
              <th class="col">Quantité</th>
              <th class="col">Période</th>
              <th class="col">Répétition</th>
              <th class="col">
                <button
                  class="btn btn-success btn-sm"
                  @click="meds.push({ name: 'paracetamol',quantity: '2 caché',periode : 'apres dejeune',repetition: 3})"
                >ajouter</button>
              </th>
            </tr>
            <tr v-for="(med,i) in meds" :key="i">
              <td>
                <input
                  type="text"
                  class="form-control"
                  placeholder="nom de médicament"
                  v-model="med.name"
                />
              </td>
              <td>
                <input
                  type="text"
                  class="form-control"
                  placeholder="quantité par dose"
                  v-model="med.quantity"
                />
              </td>
              <td>
                <input
                  type="text"
                  class="form-control"
                  placeholder="periode de consomation"
                  v-model="med.periode"
                />
              </td>
              <td>
                <input
                  type="number"
                  class="form-control"
                  placeholder="repetiton par journée"
                  v-model="med.repetition"
                />
              </td>
              <td>
                <button class="btn" @click="meds.splice(i,1)">
                  <img :src="$base_URL + 'assets/svg/SVG/delete_outline.svg'" alt />
                </button>
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
      email: "",
      tel: "",
      memTelephone: false,
      memMail: false,
      date:
        new Date().getDate() +
        "-" +
        (parseInt(new Date().getMonth()) + 1 < 10
          ? "0" + (parseInt(new Date().getMonth()) + 1)
          : parseInt(new Date().getMonth()) + 1) +
        "-" +
        new Date().getFullYear(),
      lieu: "",
      meds: [
        {
          name: "paracetamol",
          quantity: "2 comprimé",
          periode: "aprés dejeuner",
          repetition: 1
        },
        {
          name: "Dusaltin",
          quantity: "2 gel",
          periode: "matin & soir",
          repetition: 2
        },
        {
          name: "suplin",
          quantity: "1 comprimé",
          periode: "matin",
          repetition: 1
        }
      ]
    };
  },
  watch: {
    pour() {
      this.meds = this.pour.traitement.split("-").map(traitement => {
        return {
          name: traitement,
          quantity: "1 gel",
          periode: "matin",
          repetition: 1
        };
      });
    }
  },
  methods: {
    async imprimerRapport() {
      const data = {
        traitment: JSON.stringify(this.meds),
        email: this.email,
        telephone: this.tel,
        pour: JSON.stringify(this.pour),
        dr: this.dr,
        lieu: this.lieu,
        date: this.date,
        med_id: this.user.id
      };
      if (this.memTelephone) {
        data.mem_tel = this.tel;
      }
      if (this.memMail) {
        data.mem_mail = this.email;
      }
      const res = await axios({
        url: "/api/ordonnance",
        method: "POST",
        responseType: "blob",
        data 
      }).then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "ordonnance.pdf");
        document.body.appendChild(link);
        link.click();
      });
    }
  }
};
</script>

