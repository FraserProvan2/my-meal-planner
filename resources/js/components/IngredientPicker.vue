<template>
  <div>
    <!-- Ingredients -->
    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Igrendients</div>
      <div class="card-body">
        <div
          v-if="this.mealsIngredientsList.length < 1"
          class="text-muted text-center"
        >
          None yet! Start by adding below.
        </div>
        <ul v-else class="list-group">
          <li
            class="list-group-item text-center"
            v-for="(ingredient, index) in this.mealsIngredientsList"
            :key="index"
          >
            <div class="ml-2">
              <span class="text-primary">{{ ingredient.qty }}</span>
              {{ ingredient.ingredient.name }}
              <button
                class="btn btn-sm text-danger"
                @click="removeIngredient(ingredient.ingredient.id)"
              >
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- Add Ingredient -->
    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Add Igrendient</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="select-ingredient">Select Ingredient</label>
              <select
                class="form-control"
                id="select-ingredient"
                v-model="addIngredientId"
              >
                <option
                  v-for="(ingredient, index) in this.ingredientList"
                  :key="index"
                  :value="ingredient.id"
                  :selected="
                    addIngredientId && ingredient.id == addIngredientId
                  "
                >
                  {{ ingredient.name }}
                </option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="qty">Qty</label>
              <input
                type="text"
                placeholder="1, 400g"
                name="qty"
                class="form-control"
                v-model="addIngredientQty"
              />
            </div>
          </div>
        </div>

        <div class="form-group mt-2">
          <button
            class="btn btn-primary form-control"
            :disabled="!this.addIngredientQty || !this.addIngredientId"
            @click="this.addIngredient"
          >
            Add Ingredient
          </button>
        </div>

        <div class="form-group mt-2" v-if="!this.showCreateIngredient">
          <button
            class="btn btn-secondary form-control"
            @click="showCreateIngredient = true"
          >
            Create New Ingredient
          </button>
        </div>
      </div>
    </div>

    <!-- Create Ingredient -->
    <div class="card mb-3" v-if="this.showCreateIngredient">
      <div class="card-header bg-secondary h4">Create New Igrendient</div>
      <div class="card-body">
        <div class="form-group">
          <label for="ingredientName">Ingredient Name</label>
          <input
            v-model="createIngredientName"
            type="input"
            class="form-control"
            id="ingredientName"
            placeholder="Red Pepper"
          />
        </div>

        <div class="form-group mt-2">
          <button
            class="btn btn-primary form-control"
            @click="createIngredient()"
            :disabled="this.createIngredientName == ''"
          >
            Create Ingredient
          </button>
        </div>
      </div>
    </div>

    <notifications group="all" />
  </div>
</template>

<script>
export default {
  props: ["meal"],
  data() {
    return {
      showCreateIngredient: false,
      createIngredientName: "",
      ingredientList: [],
      mealsIngredientsList: [],
      addIngredientId: 0,
      addIngredientQty: "",
    };
  },
  methods: {
    getIngredients() {
      this.ingredientList = [];
      axios.get("/ingredient-picker").then((res) => {
        this.ingredientList = res.data.reverse();

        if (typeof this.ingredientList[0] !== "undefined") {
          this.addIngredientId = this.ingredientList[0].id;
        }
      });
    },
    getMealsIngredients() {
      axios.get("/meals-ingredients/" + this.meal.id).then((res) => {
        this.mealsIngredientsList = res.data;
      });
    },
    createIngredient() {
      axios
        .post("/ingredients", {
          name: this.createIngredientName,
        })
        .then(() => {
          this.fireAlert("success", "Success", "Indredient Created.");
          this.getIngredients();
          this.showCreateIngredient = false;
        })
        .catch(() => this.fireErrorAlert());
    },
    addIngredient() {
      axios
        .post("/ingredient-picker/add", {
          meal_id: this.meal.id,
          ingredient_id: this.addIngredientId,
          qty: this.addIngredientQty,
        })
        .then((res) => {
          if (res.status == 201) {
            this.fireAlert("success", "Success", "Indredient Added.");
            this.getMealsIngredients();
            this.reset();
          }
        })
        .catch(() => this.fireErrorAlert());
    },
    removeIngredient(ingredientId) {
      if (confirm("Are you sure you want to remove this Ingredient?")) {
        axios
          .post("/ingredient-picker/remove", {
            meal_id: this.meal.id,
            ingredient_id: ingredientId,
          })
          .then((res) => {
            this.fireAlert("success", "Success", "Indredient Removed.");
            this.getMealsIngredients();
          })
          .catch(() => this.fireErrorAlert());
      }
    },
    fireAlert(type, title, text) {
      this.$notify({ group: "all", title, type, text, duration: 2500 });
    },
    fireErrorAlert() {
      this.fireAlert(
        "error",
        "Error",
        "It looks like something has gone wrong :("
      );
    },
    reset() {
      this.showCreateIngredient = false;
      this.createIngredientName = "";
      this.addIngredientQty = "";
    },
  },
  mounted() {
    this.getIngredients();
    this.getMealsIngredients();
  },
};
</script>
