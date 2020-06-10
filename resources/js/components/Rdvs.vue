<template>
  <div class="container rdvs">
      <div class="rdvGrp" v-for="(rdvGrp,i) in rdvGrps" :key="i">
          <div class="wave" ><h1 style="text-decoration: underline">{{ rdvGrp[0].temp.slice(0,10) }}</h1></div>
          <div class="container">
              <table class="table">
                  <tr>
                      <th class="wave">Nom</th>
                      <th class="wave">Prenom</th>
                      <th class="wave">Gendre</th>
                      <th class="wave">Age</th>
                      <th class="wave">Téléphone</th>
                      <th class="wave">A</th>
                      <th class="wave">Supp.</th>
                  </tr>
                  <tr v-for="(rdv,k) in rdvGrp" :key="k">
                     <td>{{ rdv.nom }}</td>
                      <td>{{ rdv.prenom }}</td>
                      <td class="gendre">
                          <img :src="$base_URL + (rdv.gendre == 'male' ?  'assets/svg/SVG/male.svg':'assets/svg/SVG/female.svg')" alt="" style="width:2rem">
                      </td>
                      <td class="age">{{ rdv.age }}</td>
                      <td>{{ rdv.telephone }}</td>
                      <td class="temp">{{ rdv.temp.slice(11,13) }} h</td>
                      <td><a :href="'/admin/rendez-vous/delete/'+rdv.id"><img :src="$base_URL + 'assets/svg/SVG/delete_outline.svg'" alt=""></a></td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    created() {
        this.fetchRdvs()
    },
    data(){
        return {
            rdvGrps: null,
        }
    },
    methods: {
        async fetchRdvs() {
            let res = await axios.get('/api/rdvs')
            let newRdvArr = []
            res.data.forEach(element => {
                console.log(element.temp.slice(0,9))
                let arr = newRdvArr.find(rdv=>rdv[0].temp.slice(0,10) == element.temp.slice(0,10))
                if ( arr ) {
                    newRdvArr[newRdvArr.indexOf(arr)].push(element)
                } else {
                    newRdvArr.push([ element ])
                }
            });
            this.rdvGrps = newRdvArr.sort((a,b)=>new Date(b[0].temp) - new Date(a[0].temp))
        }
    }
}
</script>

<style lang="scss" scoped>
    .rdvGrp {
        margin: 4rem 1rem;
        border: 1px solid #08aeea;
        padding: 2rem 1rem;
        border-radius: 10px;
        .rdv {
            ul {
                display: flex;
                justify-content: space-between;
            }
        }
    }
    .table {
        font-size: 1.5rem;
        th,td {
            text-align: center;
        }
    }
</style>