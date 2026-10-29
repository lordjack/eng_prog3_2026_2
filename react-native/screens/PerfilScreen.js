import { StyleSheet, Button, Image, Text, View } from 'react-native';

export default function PerfilScreen({ navigation, route }) {
  const nome = route.params.nome;
  return (
    <View style={styles.container}>
      <Text style={styles.texto01}> Sr. {nome}</Text>
      <Image
        source={{
          uri: 'https://reactnative.dev/img/tiny_logo.png',
        }}
      />
      <Button
        title="Voltar"
        color="#2f2a3d"
        onPress={() => navigation.navigate('Home')}></Button>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  texto01: {
    color: 'blue',
    backgroundColor: 'grey',
  },
});
