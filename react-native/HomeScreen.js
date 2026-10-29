import { StyleSheet, Button, Text, View } from 'react-native';

export default function HomeScreen({ navigation }) {
  /* 
  const n = 10;
     const n = 10;
  */
  let cidade = 'Chapecó';

  return (
    <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
      <Text>Olá mundo, bem vindo ao React-native a cidade: {cidade}</Text>

      <Button
        title="Bem vindo"
        color="#2f2a3d"
        onPress={() =>
          navigation.navigate('WelcomeScreen', {
            nome: 'Jackson Meires',
            idade: 39,
          })
        }
      />
      <Button
        title="Contador"
        color="#2f2a3d"
        onPress={() => navigation.navigate('ContadorScreen')}
      />
      <Button
        title="Perfil"
        color="#2f2a3d"
        onPress={() =>
          navigation.navigate('PerfilScreen', { nome: 'Jackson Meires' })
        }
      />
      <Button
        title="Listagem de Alunos"
        color="#3f2a3d"
        onPress={() => navigation.navigate('AlunoList')}
      />
      <Button
        title="Exemplo API"
        color="#2f2a3d"
        onPress={() => navigation.navigate('ExampleAPI')}
      />
    </View>
  );
}
