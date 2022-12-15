import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../views/HomeView.vue";
import CreateView from "../views/CreateView.vue";
import UpdateView from "../views/UpdateView.vue";
import DetailView from "../views/DetailView.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/create",
    name: "CreateUser",
    component: CreateView,
  },
  {
    path: "/update/:id",
    name: "UpdateUser",
    component: UpdateView,
  },
  {
    path: "/detail/:id",
    name: "DetailUser",
    component: DetailView,
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
];

const router = new VueRouter({
  routes,
});

export default router;
