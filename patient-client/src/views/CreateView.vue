<template>
    <div class="create">
        <div class="card">
            <div class="col-4 container mt-5 rounded">
                <div class="card-header">
                  <h3 class="card-title">Create User</h3>
                  <br/>
                  <br/>
                  <form id="create-user">
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.name" 
                        placeholder="Input your name..." 
                    />
                    <br/>
                    <br/>
                    <select class="col-10 rounded border border-secondary" required v-model="addPatients.sex">
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
                        v-model="addPatients.religion" 
                        placeholder="Input your religion..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.phone" 
                        placeholder="Input your phone number..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.address" 
                        placeholder="Input your address..." 
                    />
                    <br/>
                    <br/>
                    <input 
                        type="text" 
                        required 
                        class="col-10 rounded border border-secondary" 
                        v-model="addPatients.nik" 
                        placeholder="Input your NIK number..." 
                    />
                    <br/>
                    <br/>
                    <div>
                        <b-button variant="secondary me-3" form="add-user-form" @click.prevent="handleCancel">Cancel</b-button>
                        <b-button variant="success" form="add-user-form" @click.prevent="addUser">Create User</b-button>
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
        addPatients: {
        name:"",
        sex:"",
        religion:"",
        phone:"",
        address:"",
        nik:"",
      },
    };
  },
  methods: {
      addUser() { 
        // console.log(this.addPatients)
          axiosApiIntances.post('users/create', this.addPatients)
            .then(() => {
                this.$router.push({ name: 'home' })
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
    }
}
</script>