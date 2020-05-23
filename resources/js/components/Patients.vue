<template>
    <div>
     <div class="search ">
      <input v-model="currentInput" type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <img src="assets/svg/SVG/search.svg" alt="" width="2.3rem">
     </button>
   </div>
           <div class="patients mt-5">
                <card-patient 
                         v-for="patient in patients"
                         :key="patient.id"
                         :patient="patient"
               >            
              </card-patient>
             
    </div>
      <nav aria-label="Page navigation example ">
      <ul class="pagination d-flex justify-content-center">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPatients(pagination.prev_page_url)">Precedent</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPatients(pagination.next_page_url)">Suivant</a></li>
      </ul>
      
    </nav>
    </div>
 
</template>

<script>
export default {
  props: ['facteur'],
    created() {
        this.fetchPatients()
       

    },
    data(){
        return {
            patients: [],
             pagination: {},
             currentInput: ''
        }
    },
    watch: {
        currentInput(){
            this.fetchPatients('/api/patients'+'?str='+this.currentInput)
        },
        facteur(){
          this.fetchPatients()
        }
    },
    methods: {
        fetchPatients(page_url = '/api/patients') {
         if(this.facteur){ 
            page_url = page_url.match(/page|str/)?(page_url + '&trier=' + this.facteur) : (page_url + '?trier=' + this.facteur) 
          } else {
            page_url = page_url
          }
          console.log(page_url)
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.patients = res.data;
          let pagination = {
        current_page: res.current_page,
        last_page: res.last_page,
        next_page_url: res.next_page_url,
        prev_page_url: res.prev_page_url
        };
        this.pagination = pagination;
        })
        .catch(err => console.log(err));
        },
        makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    }
}
</script>

<style>

</style>