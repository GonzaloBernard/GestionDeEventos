import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'
import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import EventosIndex from './cruds/Eventos'
import EventoSingle from './cruds/Eventos/single'
import IngresoIndex from './cruds/Ingresos'
import IngresoSingle from './cruds/Ingresos/single'
import EgresoIndex from './cruds/Egresos'
import EgresoSingle from './cruds/Egresos/single'
import EgresoCategoriaIndex from './cruds/EgresoCategoria'
import EgresoCategoriaSingle from './cruds/EgresoCategoria/single'
import MedioDePagoIndex from './cruds/MedioDePago'
import MedioDePagoSingle from './cruds/MedioDePago/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    // ENTIDADES DEL MODELO
    EventosIndex,
    EventoSingle,
    IngresoIndex,
    IngresoSingle,
    EgresoIndex,
    EgresoSingle,
    EgresoCategoriaIndex,
    EgresoCategoriaSingle,
    MedioDePagoIndex,
    MedioDePagoSingle,
  },
  strict: debug
})
