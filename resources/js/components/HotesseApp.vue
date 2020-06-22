<template>
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="search" class="form-control rounded-0" v-on:keyup="refreshList()" v-model="search"
                           placeholder="Nom du médecin">
                </div>
            </div>
            <div class="col-md-2 text-right">
                <button class="btn btn-outline-dark rounded-0 btn-block" @click="toggle" v-hotkey="keymap"><i
                    class="fal fa-plus"></i> Créer (Alt. + C)
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-sm table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Médecin</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Wilaya</th>
                        <th>Statut</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="medecin in medecins.data" :key="medecin.id">
                        <td>{{ medecin.id}}</td>
                        <td>{{ medecin.name }}</td>
                        <td>{{ medecin.email }}</td>
                        <td>{{ medecin.telephone}}</td>
                        <td>{{ medecin.wilaya.nom }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm" v-show="medecin.is_active_on_event != 0" @click="activerInscription(medecin)"><i class="fal fa-user-cog"></i> Activer</a>
                            <span class="text-success" v-show="medecin.is_active_on_event == 0"><i class="fal fa-check-double"></i> Validé</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination :data="medecins" @pagination-change-page="getMedecins"></pagination>
            </div>

            <modal name="create-medecin" width="800" height="auto">
                <div class="p-4">
                    <h3 class="mb-2">INSCRIPTION</h3>
                    <div class="alert alert-danger" v-show="formHasErrors">
                        <ul>
                            <li v-for="error in createMedecinErrors">{{ error[0]}}</li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control rounded-0" id="nom" v-model="nouvMedecin.nom" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control rounded-0" id="prenom"
                                       v-model="nouvMedecin.prenom" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" class="form-control rounded-0" id="email"
                                       v-model="nouvMedecin.email" required>
                            </div>
                            <div class="form-check mb-3">
                              <input type="checkbox" class="form-check-input" id="adhesion" ref="adhesion" @change="updateTotal" v-model="nouvMedecin.adhesion">
                              <label class="form-check-label" for="adhesion" >Adhésion</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="statut">Statut</label>
                                <select id="statut" class="form-control rounded-0" v-model="nouvMedecin.statut"
                                        required >
                                    <option value="Public">Public</option>
                                    <option value="Libéral">Libéral</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="specialite">Spécialité</label>
                                <select id="specialite" class="form-control rounded-0" v-model="nouvMedecin.specialite"
                                        required>
                                    <optgroup label="ANDEL">
                                        <option value="Endocrinologie - Diabétologie">Endocrinologie - Diabétologie</option>
                                        <option value="Médecine Interne">Médecine Interne</option>
                                    </optgroup>
                                    <optgroup label="Autres">
                                        <option value="Anesthésie Réanimation">Anesthésie Réanimation</option>
                                        <option value="Biologie Clinique">Biologie Clinique</option>
                                        <option value="Cardiologie">Cardiologie</option>
                                        <option value="Chirurgie">Chirurgie</option>
                                        <option value="Chirurgie dentaire">Chirurgie dentaire</option>
                                        <option value="Dermatologie">Dermatologie</option>
                                        <option value="Epidémiologie">Epidémiologie</option>
                                        <option value="Gastro Entérologie">Gastro Entérologie</option>
                                        <option value="Gynéco Obstetrique">Gynéco Obstetrique</option>
                                        <option value="Hématologie">Hématologie</option>
                                        <option value="Hémobiologie">Hémobiologie</option>
                                        <option value="Immunologie">Immunologie</option>
                                        <option value="Maladies Infectieuses">Maladies Infectieuses</option>
                                        <option value="Médecine du sport">Médecine du sport</option>
                                        <option value="Médecine du travail">Médecine du travail</option>
                                        <option value="Médecine générale">Médecine générale</option>
                                        <option value="Médecine Légale">Médecine Légale</option>
                                        <option value="Médecine Nucléaire">Médecine Nucléaire</option>
                                        <option value="Microbiologie">Microbiologie</option>
                                        <option value="Néphrologie">Néphrologie</option>
                                        <option value="Neuro Chirurgie">Neuro Chirurgie</option>
                                        <option value="Neurologie">Neurologie</option>
                                        <option value="Oncologie Médicale">Oncologie Médicale</option>
                                        <option value="Ophtalmologie ">Ophtalmologie</option>
                                        <option value="ORL">ORL</option>
                                        <option value="Orthopédie">Orthopédie</option>
                                        <option value="Pédiatrie">Pédiatrie</option>
                                        <option value="Pharmacologie">Pharmacologie</option>
                                        <option value="Physiologie ">Physiologie</option>
                                        <option value="Pneumo Phtisiologie">Pneumo Phtisiologie</option>
                                        <option value="Psychiatrie">Psychiatrie</option>
                                        <option value="Radiologie">Radiologie</option>
                                        <option value="Rééducation et réadaptation fonctionnelle">Rééducation et réadaptation fonctionnelle
                                        </option>
                                        <option value="Rhumatologie">Rhumatologie</option>
                                        <option value="Urologie">Urologie</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="wilaya">Wilaya</label>
                                <select id="wilaya" class="form-control rounded-0" v-model="nouvMedecin.wilaya_id"
                                        required>
                                    <option v-for="wilaya in wilayas" :value="wilaya.id">{{ wilaya.nom }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                              TOTAL : <strong>{{ total }} DA</strong>
                            </div>
                        </div>


                    </div>
                    <button class="btn btn-outline-success btn-block rounded-0" @click="storeMedecin">Sauvegarder
                    </button>
                </div>
            </modal>
            <modal name="activate-medecin" width="800" height="auto">
              <div class="p-4">
                <h3>{{ stagedMedecin.name }}</h3>
              </div>
            </modal>
        </div>
    </div>
</template>

<script>
    import VModal from 'vue-js-modal'

    Vue.use(VModal);

    var url = 'http://localhost:8000/';
    export default {
        name: "HotesseApp",
        props: ['featured'],
        data() {
            return {
                medecins: {},
                search: '',
                wilayas: {},
                nouvMedecin: {},
                createMedecinErrors:{},
                formHasErrors:null,
                total: 3000,
                stagedMedecin:{}
            }
        },
        mounted() {
            this.getMedecins();
            this.getWilayas();
        },
        computed: {
            keymap() {
                return {
                    'alt+c': {
                        keydown: this.toggle,
                        keyup: this.show
                    }
                }
            },
        },
        methods: {
            updateTotal(e){
              e.target.checked ? this.total = 7000 : this.total = 3000;
            },
            getMedecins(page = 1) {
                axios.get(url + 'api/medecins/' + this.featured + '?page=' + page).then((response) => {
                    this.medecins = response.data;
                });

            },
            checkIfRegistred(id){
              axios.get(url + 'api/is-registred-to-event',{
                  id:id
              }).then((response) => {
                  return response.data.is_valid === 0;
              })
            },
            getWilayas() {
                axios.get(url + 'api/wilayas/').then((response) => {
                    this.wilayas = response.data;
                })
            },
            createMedecin() {
                alert('OUI');
            },
            refreshList(page = 1) {
                axios.get(url + 'api/medecins/' + this.featured + '?page=' + page + '&search=' + this.search).then((response) => {
                    this.medecins = response.data;
                });
            },
            toggle() {
                this.$modal.show('create-medecin');
            },
            activerInscription(medecin) {
              this.stagedMedecin = medecin;
              this.$modal.show('activate-medecin');
            },
            storeMedecin() {
                axios.post(url + '/api/medecins', {
                    medecin: this.nouvMedecin
                })
                    .then((response) => {
                        this.nouvMedecin = {};
                        this.createMedecinErrors = {};
                        this.formHasErrors = null;
                        this.getMedecins();
                        this.$modal.hide('create-medecin');
                    })
                    .catch((error) => {
                        this.createMedecinErrors = error.response.data.errors;
                        this.formHasErrors = 1
                    })
            }
        }
    }
</script>

<style scoped>

</style>
