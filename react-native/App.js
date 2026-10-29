import * as React from 'react';
import { View, Text } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import HomeScreen from './HomeScreen';
import PerfilScreen from './screens/PerfilScreen';
import ContadorScreen from './screens/ContadorScreen';
import WelcomeScreen from './screens/WelcomeScreen';
import ExampleAPI from './screens/ExampleAPI';
import AlunoForm from './screens/AlunoForm';
import AlunoList from './screens/AlunoList';

const Stack = createNativeStackNavigator();

function RootStack() {
  return (
    <Stack.Navigator>
      <Stack.Screen name="Home" component={HomeScreen} />
      <Stack.Screen name="PerfilScreen" component={PerfilScreen} />
      <Stack.Screen name="ContadorScreen" component={ContadorScreen} />
      <Stack.Screen name="WelcomeScreen" component={WelcomeScreen} />
      <Stack.Screen
        name="AlunoForm"
        component={AlunoForm}
        options={{
          title: 'Formulário de Aluno',
        }}
      />
      <Stack.Screen
        name="AlunoList"
        component={AlunoList}
        options={{
          title: 'Listagem de Alunos',
        }}
      />
      <Stack.Screen
        name="ExampleAPI"
        component={ExampleAPI}
        options={{
          title: 'Listagem dados API',
        }}
      />
    </Stack.Navigator>
  );
}

export default function App() {
  return (
    <NavigationContainer>
      <RootStack />
    </NavigationContainer>
  );
}
