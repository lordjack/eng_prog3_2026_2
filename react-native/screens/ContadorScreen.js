import React, { useState } from 'react';
import { Button, StyleSheet, Text, View } from 'react-native';

export default function ContadorScreen() {
  const [count, setCount] = useState(0);

  const contar = () => {
    setCount(count + 1);
  };

  return (
    <View>
      <Text style={styles.texto}>Contador: {count}</Text>
      <Button title="Contar" color="#2f2a3d" onPress={contar}></Button>
    </View>
  );
}
const styles = StyleSheet.create({
  texto: {
    color: 'red',
  },
});
