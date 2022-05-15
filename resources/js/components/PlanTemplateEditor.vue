<template>
  <div class="table-responsive">
    <table class="table table-light table-borderless text-center mb-0">
      <tbody v-if="this.templateMemory">
        <tr>
          <td class="bg-primary text-white"></td>
          <td class="bg-primary text-white">Monday</td>
          <td class="bg-primary text-white">Tuesday</td>
          <td class="bg-primary text-white">Wednesday</td>
          <td class="bg-primary text-white">Thursday</td>
          <td class="bg-primary text-white">Friday</td>
          <td class="bg-primary text-white">Saturday</td>
          <td class="bg-primary text-white">Sunday</td>
        </tr>
        <tr>
          <td class="bg-secondary align-middle">Breakfast</td>
          
          <!-- Monday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.monday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('monday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.monday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('monday', 'breakfast', 1)"
            >Disabled</button>
          </td>

          <!-- Tuesday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.tuesday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.tuesday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'breakfast', 1)"
            >Disabled</button>
          </td>

          <!-- Wednesday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.wednesday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.wednesday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'breakfast', 1)"
            >Disabled</button>
          </td>

          <!-- Thursday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.thursday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('thursday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.thursday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('thursday', 'breakfast', 1)"
            >Disabled</button>
          </td>

          <!-- Friday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.friday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('friday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.friday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('friday', 'breakfast', 1)"
            >Disabled</button>
          </td>

          <!-- Saturday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.saturday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('saturday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.saturday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('saturday', 'breakfast', 1)"
            >Disabled</button>
          </td>
          
          <!-- Sunday breakfast -->
          <td>
            <button 
                v-if="this.templateMemory.sunday.breakfast"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('sunday', 'breakfast', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.sunday.breakfast"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('sunday', 'breakfast', 1)"
            >Disabled</button>
          </td>

        </tr>
        <tr>
          <td class="bg-secondary align-middle">Lunch</td>
          
          <!-- Monday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.monday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('monday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.monday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('monday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Tuesday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.tuesday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.tuesday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Wednesday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.wednesday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.wednesday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Thursday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.thursday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('thursday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.thursday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('thursday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Friday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.friday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('friday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.friday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('friday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Saturday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.saturday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('saturday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.saturday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('saturday', 'lunch', 1)"
            >Disabled</button>
          </td>

          <!-- Sunday lunch -->
          <td>
            <button 
                v-if="this.templateMemory.sunday.lunch"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('sunday', 'lunch', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.sunday.lunch"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('sunday', 'lunch', 1)"
            >Disabled</button>
          </td>

        </tr>
        <tr>
          <td class="bg-secondary align-middle">Dinner</td>

          <!-- Monday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.monday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('monday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.monday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('monday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Tuesday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.tuesday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.tuesday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('tuesday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Wednesday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.wednesday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.wednesday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('wednesday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Thursday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.thursday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('thursday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.thursday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('thursday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Friday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.friday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('friday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.friday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('friday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Saturday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.saturday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('saturday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.saturday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('saturday', 'dinner', 1)"
            >Disabled</button>
          </td>

          <!-- Sunday dinner -->
          <td>
            <button 
                v-if="this.templateMemory.sunday.dinner"
                class="btn btn-primary plan-template-btn"
                @click="() => updateMealSlot('sunday', 'dinner', 0)"
            >&nbsp;Enabled</button>
            <button 
                v-else-if="!this.templateMemory.sunday.dinner"
                class="btn btn-danger text-white plan-template-btn"
                @click="() => updateMealSlot('sunday', 'dinner', 1)"
            >Disabled</button>
          </td>

        </tr>
      </tbody>
    </table>

    <notifications group="all" />
  </div>
</template>

<script>
export default {
    props: ['template'],
    data() {
        return {
            templateMemory: false
        }
    },
    methods: {
        updateMealSlot(day, meal, toUpdateTo) {
            this.templateMemory[day][meal] = toUpdateTo;
            this.updatePlan();
        },
        updatePlan() {
            axios.post('/plan-template', {
                template: JSON.stringify(this.templateMemory)
            }).catch(() => {
                this.fireAlert("error", "Error", "It looks like something has gone wrong :(");
            });
        },
        fireAlert(type, title, text) {
            this.$notify({ group: "all", title, type, text, duration: 2500 });
        },
    },
    mounted() {
        this.templateMemory = JSON.parse(this.template);
    }
};
</script>

<style>
</style>