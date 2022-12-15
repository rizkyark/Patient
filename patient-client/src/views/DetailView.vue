<template>
    <div class="create">
        <div class="card">
            <div class="col-4 container mt-5 rounded">
                <div class="card-header">
                  <h3 class="card-title">Detail User</h3>
                  <hr/>
                  <br/>
                  <h5>ID       : {{addPatients.user_id}}</h5>
                  <br/>
                  <h5>Name     : {{addPatients.user_name}}</h5>
                  <br/>
                  <h5>Gender   : {{addPatients.user_sex}}</h5>
                  <br/>
                  <h5>Religion : {{addPatients.user_religion}}</h5>
                  <br/>
                  <h5>Phone    : {{addPatients.user_phone}}</h5>
                  <br/>
                  <h5>Address  : {{addPatients.user_address}}</h5>
                  <br/>
                  <h5>NIK      : {{addPatients.user_nik}}</h5>
                  <br/>
                  <br/>
                  <div>
                      <b-button variant="outline-success me-3" form="add-user-form" @click.prevent="handleCancel">Back to Home</b-button>
                      <b-button variant="success" form="add-user-form" @click.prevent="updateUser">Edit User</b-button>
                  </div>
                  <br/>
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
        this.$router.push({ name: 'UpdateUser', params: { id } })
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