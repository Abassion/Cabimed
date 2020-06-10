<template>
    <div class="patients-container">
        <div class="title text-center">
            <h1 class="wave" style="font-size: 3.5rem">Liste des patients</h1>
        </div>
        <div class="search" :style="{ opacity : searchOpacity , transform: searchTransform }">
            <input
                v-model="currentInput"
                type="text"
                class="searchTerm"
                placeholder="Rechercher un patient"
                autofocus
            />
            <button type="submit" class="searchButton">
                <img
                    src="assets/svg/SVG/search.svg"
                    alt=""
                    style="width: 1.9rem"
                />
            </button>
        </div>
        <div class="mt-5">
            <transition-group name="list" class="patients">
                            <card-patient
                v-for="patient in patients"
                :key="patient.id"
                :patient="patient"
            >
                <slot></slot>
            </card-patient>
            </transition-group>

        </div>
        <nav aria-label="Page navigation example ">
            <ul class="pagination d-flex justify-content-center">
                <li
                    v-bind:class="[{ disabled: !pagination.prev_page_url }]"
                    class="page-item"
                >
                    <a
                        class="page-link"
                        href="#"
                        @click="fetchPatients(pagination.prev_page_url)"
                        >Précédent</a
                    >
                </li>

                <li class="page-item disabled">
                    <a class="page-link text-dark" href="#"
                        >Page {{ pagination.current_page }} sur
                        {{ pagination.last_page }}</a
                    >
                </li>

                <li
                    v-bind:class="[{ disabled: !pagination.next_page_url }]"
                    class="page-item"
                >
                    <a
                        class="page-link"
                        href="#"
                        @click="fetchPatients(pagination.next_page_url)"
                        >Suivant</a
                    >
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    props: ["facteur","showrecherche"],
    created() {
        this.fetchPatients();
    },
    data() {
        return {
            patients: [],
            pagination: {},
            currentInput: "",
            recherche:false,
            searchOpacity: 0,
            searchTransform: 'translateX(-200px)'
        };
    },
    watch: {
        currentInput() {
            this.fetchPatients("/api/patients" + "?str=" + this.currentInput);
        },
        facteur() {
            this.fetchPatients();
        },
        showrecherche() {
            if(this.searchOpacity == 0) {
                this.searchOpacity = 1
                this.searchTransform = 'translateX(0px)'
            } else {
                this.searchOpacity = 0
                this.searchTransform = 'translateX(-200px)'
            }
        }
    },
    methods: {
        fetchPatients(page_url = "/api/patients") {
            if (this.facteur) {
                page_url = page_url.match(/page|str/)
                    ? page_url + "&trier=" + this.facteur
                    : page_url + "?trier=" + this.facteur;
            } else {
                page_url = page_url;
            }
            console.log(page_url);
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
        }
    }
};
</script>

<style>

.list-enter-active, .list-leave-active {
  transition: all .2s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}
</style>
