<template>
  <v-row justify="center">
    <template>
      <v-chip outlined large color="primary darken-3" dark>Saldo Pendiente   
        <span class="m-2" >
            {{`$ ${getSaldoPendiente}`}}
        </span>
      </v-chip> 
    </template>
    <create-ingreso scenario="multiple" />
    <create-egreso scenario="multiple" />

    <v-row justify="center">
      <v-card
        v-for="(ingreso, indexIngreso) in entry.ingresos"
        elevation="3"
        class="mx-2 mb-4"
        color="green darken-3"
        dark
        outlined
        shaped
        :key="indexIngreso + 200"
        width="200"
      >
        <v-card-title class="mb-2">
          <v-row justify="space-around">
            <span>$ {{ parseFloat(ingreso.monto).toFixed(2) }}
            </span>
            <!-- El v-if="!ingreso.created_at" deja eliminar solo los que no esten en base de datos -->
            <!-- Todos los ingresos / egresos con created_at NO SE MANDAN en la request -->
            <v-btn
              v-if="!ingreso.created_at"
              fab
              dark
              x-small
              color="green lighten-3"
              @click="removeEgresoIngreso('Ingreso', indexIngreso)"
            >
              <v-icon dark color="white"> mdi-delete-forever </v-icon>
            </v-btn>
          </v-row>
          <v-row justify="start">
            <v-chip outlined>{{ ingreso.fecha.substring(0, 10) }}</v-chip>
            <v-chip outlined color="smokewhite darken-3" dark>
              {{ingreso.medio_de_pago !== null ? ingreso.medio_de_pago.descripcion : 'No registrado'}}
            </v-chip>
          </v-row>
        </v-card-title>
      </v-card>
      <v-card
        v-for="(egreso, index) in entry.egresos"
        elevation="3"
        color="red darken-3"
        class="mx-2 mb-4"
        dark
        outlined
        shaped
        :key="index"
        width="200"
      >
        <v-card-title class="mb-2">
          <v-row justify="space-around">
            <span>$ {{ parseFloat(egreso.monto).toFixed(2) }} </span>
            <!-- El v-if="!egreso.created_at" deja eliminar solo los que no esten en base de datos -->
            <!-- Todos los egresos / egresos con created_at NO SE MANDAN en la request -->
            <v-btn
            v-if="!egreso.created_at"
              fab
              dark
              x-small
              color="red lighten-3"
              @click="removeEgresoIngreso('Egreso', index)"
            >
              <v-icon dark color="white"> mdi-delete-forever </v-icon>
            </v-btn>
          </v-row>
          <v-row justify="start">
          <v-chip outlined>{{ egreso.fecha.substring(0, 10) }}</v-chip>
          <v-chip outlined color="smokewhite darken-3" dark>
              {{egreso.egreso_categoria !== null ? egreso.egreso_categoria.descripcion : 'No registrado'}}
          </v-chip>
          </v-row>
        </v-card-title>
      </v-card>
    </v-row>
  </v-row>
</template>

<script>
import CreateIngreso from "@cruds/Ingresos/Create";
import CreateEgreso from "@cruds/Egresos/Create";
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters("EventoSingle", ["entry","getSaldoPendiente"]),
    ...mapGetters("IngresoSingle", ["listsIngresos"]),
    ...mapGetters("EgresoSingle", ["listsEgresos"]),
  },
  methods: {
    ...mapActions("EventoSingle", ["removeEgreso", "removeIngreso"]),
    removeEgresoIngreso(tipo, index) {
      this[`remove${tipo}`](index);
    },
  },
  components: {
    CreateIngreso,
    CreateEgreso,
  },
  beforeDestroy() {
    this.$store.dispatch("EventoSingle/resetState");
  },
};
</script>

<style>
</style>