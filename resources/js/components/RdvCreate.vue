<template>
  <div class="step-0" v-if="step == 0">
    <div class="absolute">
      <h1 class="text-uppercase">
        Nous sommes là
        <br />pour vous
        <br />
      </h1>
      <button class="primary-btn mt-20 text-uppercase" @click="step++">Prendre un rendez-vous</button>
    </div>
  </div>
  <div class="steps" v-else>
    <v-alert
      type="error"
      class="alert"
      v-show="message_alert && (step==3 || step==2)"
    >{{ message_alert }}</v-alert>
    <div class="left-arrow" v-show="step!==5" @click="step--">
      <img src="assets/svg/SVG/back.svg" alt class="back-svg" />
    </div>
    <div v-if="step == 1" class="container">
      <div class="titre text-center">
        <h3>Choisir une date</h3>
      </div>
      <div class="container">
        <v-date-picker v-model="date" class="d-block" width="260"></v-date-picker>
        <div class="next" @click="verifierDate();step++">
          <button class="btn btn-success btn-sm">Suivant</button>
        </div>
      </div>
    </div>
    <div v-if="step == 2" class="full-height">
      <div class="titre text-center">
        <h3>Choisir une heure</h3>
      </div>
      <div class="times container">
        <div class="time-container" v-for="(time,index) in times" :key="index">
          <button
            class="time text-center"
            :class="{ timesDisabled : !time.available }"
            @click="heure = time.db_time"
            :disabled="!time.available"
          >{{ time.time }}</button>
        </div>
      </div>
      <div class="next">
        <button class="btn btn-success" @click="validerHeure()">Suivant</button>
      </div>
    </div>
    <div v-if="step == 3" class="full-height">
      <div class="titre text-center">
        <h3>Entrez vos informations</h3>
      </div>
      <div class="container">
        <v-text-field v-model="nom" label="Nom" outlined shaped></v-text-field>
        <v-text-field v-model="prenom" label="Prénom" outlined shaped></v-text-field>
        <v-text-field v-model="telephone" label="Téléphone" outlined shaped></v-text-field>
        <v-text-field v-model="age" label="Age" outlined shaped></v-text-field>
        <div style="display:flex;justify-content:space-between">
          <v-select
            :items="['male','female']"
            style="width: 100px;flex-grow:0;align-self:center"
            v-model="gendre"
            label="gendre"
            outlined
          ></v-select>

          <button
            class="btn btn-success"
            @click="verifierInfos()"
            style="align-self:center; border-top-right-radius: 16px;border-bottom-right-radius: 0px"
          >Suivant</button>
        </div>
      </div>
    </div>
    <div class="step-4 full-height" v-if="step == 4">
      <div class="titre text-center">
        <h3>Verification</h3>
      </div>
      <div class="container">
        <ul>
          <li>
            <strong>Nom</strong>
            : {{ nom }}
          </li>
          <li>
            <strong>Prénom</strong>
            : {{ prenom }}
          </li>
          <li>
            <strong>Gendre</strong>
            : {{ gendre }}
          </li>
          <li>
            <strong>Age</strong>
            : {{ age }} ans
          </li>
          <li>
            <strong>Téléphone</strong>
            : {{ telephone }}
          </li>
          <li class="success--text font-weight-bold bold mt-5">Le {{ date }} à {{ heure }}</li>
        </ul>
      </div>
      <div class="next">
        <button class="btn btn-success" @click="createRdv()">Confirmer</button>
      </div>
    </div>
    <div class="step-5" v-if="step == 5">
      <div class="titre text-center">
        <h3 v-show="false">Success</h3>
      </div>
      <div class="icon text-center">
        <img src="assets/svg/SVG/rdv.svg" alt style="width:130px" />
      </div>
      <div class="text success--text font-weight-bold bold">
        Réservation réussite.
        <br />
        <p style="margin-top:2rem;font-size:1.3rem">Souyez les bienvenus</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      step: 0,
      date: null,
      heure: null,
      nom: null,
      prenom: null,
      telephone: null,
      gendre: null,
      message_alert: "",
      age: null,
      times: [
        {
          time: "8h - 9h",
          available: true,
          db_time: "08:00:00"
        },
        {
          time: "9h - 10h",
          available: true,
          db_time: "09:00:00"
        },
        {
          time: "10h - 11h",
          available: true,
          db_time: "10:00:00"
        },
        {
          time: "11h - 12h",
          available: true,
          db_time: "11:00:00"
        },
        {
          time: "14h - 15h",
          available: true,
          db_time: "14:00:00"
        },
        {
          time: "15h - 16h",
          available: true,
          db_time: "15:00:00"
        },
        {
          time: "16h - 17h",
          available: true,
          db_time: "16:00:00"
        },
        {
          time: "17h - 18h",
          available: true,
          db_time: "17:00:00"
        }
      ]
    };
  },
  methods: {
    async verifierDate() {
      console.log(this.date);
      let res = await axios.get("/api/rdv/" + this.date);
      this.times.forEach(x => (x.available = true));
      for (let i = 0; i < res.data.length; i++) {
        var time = res.data[i].temp.slice(-8);
        let ele = this.times.find(x => x.db_time == time);
        if (ele) ele.available = false;
      }
    },
    async createRdv() {
        let res = await axios.post("/rdv/create", {
          nom: this.nom,
          prenom: this.prenom,
          gendre: this.gendre,
          telephone: this.telephone,
          time: this.date + " " + this.heure,
          age: this.age
        });
        this.step++;
    },
    verifierInfos() {
      if (
        !this.nom ||
        !this.prenom ||
        !this.telephone ||
        !this.age ||
        !this.gendre
      ) {
        this.message_alert = "S'il vous plaît remplir tous les informations.";
        return;
      } else if (
        this.age.match(/[A-Za-z]/) ||
        this.telephone.match(/[A-Za-z]/)
      ) {
        this.message_alert = "Âge et téléphone doivent être des chiffres.";
        return;
      } else {
        this.step++;
      }
    },
    validerHeure() {
      if (this.heure) {
        this.step++;
      } else {
        this.message_alert = "S'il vous plaît choisir une heure.";
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.steps {
  background-color: #fff;
  padding: 1rem 2rem;
  border-radius: 25px;
  max-width: 400px;
  height: 510px;
  box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.15);
}
.times {
  display: flex;
  flex-wrap: wrap;
  & > * {
    flex-basis: 50%;
    display: flex;
    justify-content: center;
  }
}
.time {
  padding: 0.5rem 1rem;
  width: 120px;
  background-color: #08aeea;
  border-radius: 10px;
  font-size: 1.2rem;
  color: white;
  font-weight: bold;
  box-shadow: 2px 7px 8px rgba(0, 0, 0, 0.15);
  margin: 1rem 0rem;
  &:active,
  &:focus {
    background-color: #38c172;
    box-shadow: 2px 10px 8px rgba(0, 0, 0, 0.5);
    transition: all 0.4s;
  }
}
.timesDisabled {
  background-color: rgb(216, 216, 216);
  color: #888;
  pointer-events: none;
}
.back-svg {
  position: absolute;
  top: 6.5%;
  left: 6.5%;
  width: 20px;
}
.titre {
  font-size: 25px;
  padding: 0.5rem 0 2rem 0;
}
.next {
  display: flex;
  justify-content: center;
  padding: 1rem 0 0.2rem 0;
  margin-top: auto;
}
.full-height {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}
.step-4 {
  ul {
    li {
      font-size: 1.8rem;
      margin: 1.2rem 0;
    }
  }
}
.step-5 {
  margin-top: 3rem;
  .icon {
    margin-bottom: 2rem;
  }
  .text {
    font-size: 2.6rem;
    text-align: center;
  }
}
.alert {
  position: fixed;
  top: -15%;
  left: 5%;
}
@media (max-width: 1000px) {
  .steps {
    transform: translateY(-150px) !important;
  }
}
</style>