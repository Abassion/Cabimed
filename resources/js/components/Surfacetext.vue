<template>
  <div>
    <v-textarea
      outlined
      :name="id"
      v-show="condition"
      v-model="infoData"
      autofocus
      v-if="allowed"
    ></v-textarea>
    <div v-show="!condition && infoData" class="paragraph">
      <span v-for="(word,index) in infoData.split('-')" :key="index">
        <span v-if="word">{{ word }}</span>
      </span>
    </div>
    <v-card-text class="headline" style="position: relative"></v-card-text>
    <v-card-actions class="mt-auto card-actions" v-if="allowed">
      <v-list-item class="grow">
        <v-row align="center" justify="end">
          <v-btn @click="condition = !condition" class="success">
            <span v-if="condition">Valider</span>
            <span v-else>Modifier</span>
          </v-btn>
        </v-row>
      </v-list-item>
    </v-card-actions>
  </div>
</template>

<script>
export default {
  props: ["id", "info", "allowed"],
  data() {
    return {
      condition: false,
      infoData: this.info
    };
  }
};
</script>

<style lang="scss" scoped>
.paragraph {
  font-size: 1.2rem;
  color: rgb(255, 255, 255);
  padding: 0.5rem 2.5rem;
  span {
    span {
      display: inline-block;
      background-color: #08aeea;
      padding: 0.5rem 1rem;
      border-radius: 100px;
      margin: 0.7rem 0.3rem;
    }
  }
}
</style>