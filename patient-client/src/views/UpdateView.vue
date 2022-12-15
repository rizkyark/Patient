<template>
    <div class="create">
        <div class="card">
            <div class="col-4 container mt-5 rounded">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                  <br/>
                  <br/>
                  <form id="create-user">
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.user_name" 
                        placeholder="Input your name..." 
                    />
                    <br/>
                    <br/>
                    <select class="col-10 rounded border border-secondary" required v-model="addPatients.user_sex">
                        <option value="" disabled selected>Select your gender...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.user_religion" 
                        placeholder="Input your religion..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.user_phone" 
                        placeholder="Input your phone number..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.user_address" 
                        placeholder="Input your address..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.user_nik" 
                        placeholder="Input your NIK number..." 
                    />
                    <br/>
                    <br/>
                    <div>
                        <b-button variant="secondary me-3" form="add-user-form" @click.prevent="handleCancel">Cancel</b-button>
                        <b-button variant="success" form="add-user-form" @click.prevent="updateUser">Update User</b-button>
                    </div>
                    <br/>
                    <br/>
                  </form>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
import axiosApiIntances from '../../src/utils/axios'

export default {
  name: 'CreateView',
  components: {
  },
  data() {
    return {
        addPatients: {},
    };
  },
  methods: {
      updateUser() { 
        const id = this.$route.params.id
        // console.log(this.addPatients)
          axiosApiIntances.patch(`users/update/${id}`, this.addPatients)
            .then(() => {
                this.$router.push({ name: 'home' })
            })
            .catch((err) => {
              console.log(err)
            })
      },
      getPatientById() {
        const id = this.$route.params.id
        axiosApiIntances.get(`users/detail/${id}`)
        .then((res) => {
            this.addPatients = res.data.data
            // console.log(res.data.data)
          })
          .catch((err) => {
            console.log(err)
          })
    },
      handleCancel() {
        this.$router.push({ name: 'home' })
      }
  },
  created() {
    this.getPatientById()
    }
}
</script>