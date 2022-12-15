<template>
  <div class="home">
    <div class="container mt-5">
      <div class="card">
          <div class="card-header d-flex justify-content-between">
              <h3 class="card-title">Patient List</h3>
              <div class="card-tools">
                  <button
                      type="button"
                      class="btn btn-success"
                      @click.prevent="handleCreateUser"
                  >
                      Add New User
                  </button>
              </div>
          </div>
        </div>
      <table class="table table-light table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>phone</th>
            <th>Address</th>
            <th>NIK</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(patient, index) in patients" :key="index++">
            <td>{{index}}</td>
            <td>{{patient.user_name}}</td>
            <td>{{patient.user_sex}}</td>
            <td>{{patient.user_religion}}</td>
            <td>{{patient.user_phone}}</td>
            <td>{{patient.user_address}}</td>
            <td>{{patient.user_nik}}</td>
            <!-- <td><b-form-input type="text" v-model="patient.user_name"/></td> -->
            <td>
              <a @click.prevent="handleDetailUser(patient.user_id)" class="btn btn-secondary me-3">Detail User</a>
              <a @click.prevent="handleUpdateUser(patient.user_id)" class="btn btn-success me-3">Edit User</a>
              <a @click.prevent="deleteUser(patient.user_id)" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- <h5>{{patients}}</h5> -->
  </div>

</template>

<script>
// @ is an alias to /src
// import Navbar from '@/components/Navbar.vue'
import axiosApiIntances from '../../src/utils/axios'

export default {
  name: 'HomeView',
  components: {
  },
  data() {
    return {
      patients: [],
    };
  },
  methods: {
    getAllPatient() {
      axiosApiIntances.get('users')
      .then((res) => {
          this.patients = res.data.data
          // console.log(res.data.data)
        })
        .catch((err) => {
          console.log(err)
        })
    },
    setPatient(data) {
      this.patiens = data;
    },
    deleteUser(id) {
      axiosApiIntances.delete(`users/delete/${id}`)
      .then((res) => {
        this.$toast.success(res.data.msg, {
              type: "success",
              position: "top-right",
              duration: 3000,
              dismissible: true,
            });
        // console.log(res)
        this.getAllPatient()
        })
        .catch((err) => {
          console.log(err)
        })
      console.log(id)
    },
    handleCreateUser() {
        this.$router.push({ name: 'CreateUser' })
    },
    handleUpdateUser(id) {
        this.$router.push({ name: 'UpdateUser', params: { id } })
    },
    handleDetailUser(id) {
        this.$router.push({ name: 'DetailUser', params: { id } })
    },
  },
  created() {
      this.getAllPatient()
    }
}
</script>
