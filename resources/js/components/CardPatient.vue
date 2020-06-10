<template>
  <v-card class="mx-auto card-patient">
    <v-list-item>
      <v-list-item-avatar
        color="light-blue darken-1 white--text"
        class="circle"
      >{{ patient.nom.substr(0,1) }}</v-list-item-avatar>
      <v-list-item-content>
        <v-list-item-title class="headline">{{ patient.nom }} {{ patient.prenom }}</v-list-item-title>
        <v-list-item-subtitle>{{ patient.telephone }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-card-text class="card-content">
      <ul>
        <li>
          <img src="assets/svg/SVG/weight.svg" alt />
          <span>
            <span class="keyword">poids :</span>
            {{ patient.poids }} kg
          </span>
        </li>
        <li>
          <img src="assets/svg/SVG/old.svg" alt />
          <span>
            <span class="keyword">age :</span>
            {{ calculateAge(patient.date_naissance) }} ans
          </span>
        </li>
        <li>
          <img src="assets/svg/SVG/height.svg" alt />
          <span>
            <span class="keyword">taille :</span>
            {{ patient.taille }} cm
          </span>
        </li>
        <li>
          <img src="assets/svg/SVG/refresh.svg" alt />
          <span>
            <span class="keyword">der. màj :</span>
            {{ timeSince(patient.updated_at) }}
          </span>
        </li>
        <li class="adresse">
          <img src="assets/svg/SVG/adress.svg" alt />
          <span>
            <span class="keyword">adresse :</span>
            {{ patient.adresse }}
          </span>
        </li>
      </ul>
    </v-card-text>
    <v-card-actions>
      <form :action="'/admin/patient/'+patient.id+'/delete'" method="POST">
        <slot></slot>
        <v-btn text class="red--text supprimer" type="submit">Supprimer</v-btn>
      </form>

      <a :href="'/admin/patient/'+patient.id" style="margin-left: auto">
        <v-btn text class="teal accent-3 white--text ml-auto ouvrir">Ouvrir</v-btn>
      </a>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: ["patient"],
  methods: {
    calculateAge(data) {
      const date = new Date();
      return parseInt(date.getFullYear()) - parseInt(data.match(/\d{4}/)[0]);
    },
    timeSince(date) {
      var seconds = Math.floor((new Date() - new Date(date)) / 1000);
      var interval = Math.floor(seconds / 31536000);

      if (interval > 1) {
        return interval + " years";
      }
      interval = Math.floor(seconds / 2592000);
      if (interval > 1) {
        return interval + " months";
      }
      interval = Math.floor(seconds / 86400);
      if (interval > 1) {
        return interval + " days";
      }
      interval = Math.floor(seconds / 3600);
      if (interval > 1) {
        return interval + " hours";
      }
      interval = Math.floor(seconds / 60);
      if (interval >= 1) {
        return interval + " minutes";
      }
      return Math.floor(seconds) + " seconds";
    }
  }
};
</script>