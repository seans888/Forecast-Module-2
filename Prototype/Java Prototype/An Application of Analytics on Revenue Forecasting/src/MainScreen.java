import javax.swing.*;

import java.awt.*;

import static javafx.scene.input.KeyCode.F;

/**
 * Created by student on 8/1/2017.
 */
public class MainScreen
{
    public void run()
    {
        JFrame frame = new JFrame("Revenue Forecasting System");
        String[] optionsList = {"Import Data","Generate Forecast","View Reports"};
        JComboBox<String[]> options = new JComboBox(optionsList);
        frame.setLayout(new CardLayout());
        frame.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
        frame.setSize(150,300);
        JPanel panel = new JPanel();
        JButton enter = new JButton("Enter");
        JButton exit = new JButton("Exit");
        JButton help = new JButton("Help");

        panel.add(options);
        panel.add(enter);
        panel.add(exit);
        panel.add(help);

        frame.add(panel);
        frame.setVisible(true);


    }
}
